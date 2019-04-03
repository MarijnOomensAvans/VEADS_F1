<?php

namespace App\Http\Controllers\Backend;

use App\FacebookPage;
use App\Services\FacebookService;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookController extends Controller
{
    public function index(FacebookService $facebookService) {
        $fb = $facebookService->getFacebookClient();

        $urlHelper = $fb->getRedirectLoginHelper();
        $permissions = ['manage_pages'];
        $fbLoginUrl = $urlHelper->getLoginUrl(config('app.url') . '/fb/callback', $permissions);

        return view('back.facebook.index', ['fb_login_url' => $fbLoginUrl]);
    }

    public function callback(FacebookService $facebookService) {
        $fb = $facebookService->getFacebookClient();

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        // Logged in
        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);

        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId(config('facebook.app_id'));
        $tokenMetadata->validateExpiration();

        if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
                exit;
            }
        }

        $response = $fb->get('/me/accounts', $accessToken);

        foreach($response->getGraphEdge() as $page) {
            $data = $page->asArray();

            $p = new FacebookPage([
                'id' => $data['id'],
                'name' => $data['name'],
                'access_token' => $data['access_token'],
                'last_refresh' => Carbon::now()
            ]);
            $p->save();
        }

        return redirect(action('Backend\FacebookController@index'));
    }
}
