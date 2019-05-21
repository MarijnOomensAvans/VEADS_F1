<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wizard\WizardAnalyticsRequest;
use App\Http\Requests\Wizard\WizardAppRequest;
use App\Http\Requests\Wizard\WizardDatabaseRequest;
use App\Http\Requests\Wizard\WizardFacebookRequest;
use App\Http\Requests\Wizard\WizardInstagramRequest;
use App\Http\Requests\Wizard\WizardMailRequest;
use App\Http\Requests\Wizard\WizardMollieRequest;
use App\WizardDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class WizardController extends Controller
{
    public function index() {
        return redirect('/wizard/intro');
    }

    public function showStep(string $step) {
        if (!view()->exists('wizard.' . $step)) {
            return abort(404);
        }

        return $this->getView($step);
    }

    public function processApp(WizardAppRequest $request) {
        return $this->storeDetails($request, 'database');
    }

    public function processDatabase(WizardDatabaseRequest $request) {
        return $this->storeDetails($request, 'mail');
    }

    public function processMail(WizardMailRequest $request) {
        return $this->storeDetails($request, 'facebook');
    }

    public function processFacebook(WizardFacebookRequest $request) {
        return $this->storeDetails($request, 'instagram');
    }

    public function processInstagram(WizardInstagramRequest $request) {
        return $this->storeDetails($request, 'mollie');
    }

    public function processMollie(WizardMollieRequest $request) {
        return $this->storeDetails($request, 'analytics');
    }

    public function processAnalytics(WizardAnalyticsRequest $request) {
        return $this->storeDetails($request, 'done');
    }

    public function processDone() {
        if (!session()->has('details')) {
            session()->put('details', new WizardDetails());
            return redirect('/wizard/intro');
        }

        /**
         * @var $details WizardDetails
         */
        $details = session()->get('details');

        // 1. Create .env file
        $env_content = "APP_NAME=" . $details->getAppName() . "
APP_ENV=production
APP_KEY=base64:hQiYgMwYKrSQvLRtrt5BJjrfMA9bqHRbHyqo1RGY/i4=
APP_DEBUG=false
APP_URL=" . $details->getAppUrl() . "

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=" . $details->getDbHost() . "
DB_PORT=" . $details->getDbPort() . "
DB_DATABASE=" . $details->getDbName() . "
DB_USERNAME=" . $details->getDbUser() . "
DB_PASSWORD=" . $details->getDbPass() . "

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=" . $details->getMailDriver() . "
MAIL_HOST=" . $details->getMailHost() . "
MAIL_PORT=" . $details->getMailPort() . "
MAIL_USERNAME=" . (empty($details->getMailUsername()) ? "null" : $details->getMailUsername()) . "
MAIL_PASSWORD=" . (empty($details->getMailPassword()) ? "null" : $details->getMailPassword()) . "
MAIL_ENCRYPTION=" . (empty($details->getMailEncryption()) ? "null" : $details->getMailEncryption()) . "
MAIL_FROM_ADDRESS=" . $details->getMailFromAddress() . "
MAIL_FROM_NAME=" . $details->getMailFromName() . "

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY=
MIX_PUSHER_APP_CLUSTER=

FACEBOOK_APP_ID=" . $details->getFbAppId() . "
FACEBOOK_APP_SECRET=" . $details->getFbAppSecret() . "

INSTAGRAM_CLIENT_ID=" . $details->getInstaClientId() . "
INSTAGRAM_CLIENT_SECRET=" . $details->getInstaClientSecret() . "

MOLLIE_KEY=" . $details->getMollieKey() . "

GOOGLE_TRACKING_ID=" . $details->getAnalyticsTrackingId() . "
GOOGLE_VIEW_ID=" . $details->getAnalyticsViewId() . "\n";

        file_put_contents(base_path('.env'), $env_content);

        // 2. Execute artisan 'key:generate' command
        Artisan::call('key:generate', ['--force' => true]);

        return redirect('/wizard/finish');
    }

    public function finish() {

        // 3. Execute db migrations
        Artisan::call('migrate:fresh', ['--force' => true]);

        // 4. Execute db seeds
        Artisan::call('db:seed', ['--force' => true]);

        // 5. Create 'service-account-credentials.json' in 'storage/app'
        $service_account_content = "{
  \"type\": \"service_account\",
  \"project_id\": \"veads-239413\",
  \"private_key_id\": \"3fc252b81f2008e5a7744f832dae28babea7231b\",
  \"private_key\": \"-----BEGIN PRIVATE KEY-----\\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCWb43hPuOneaZL\\n/7iB7ao19kRZFq3KHvHrNcV4kPBkNlJbeDACpKleic+PmTjfyve07ZbhFE6CgwYc\\nDHS38idCvPBhmB3dS1qnwAzB5DlV7EXVps73+WIDfj5gQxTc+1bCpzXgLblSZLqI\\ncSca0MZQQJWujBLuyKqY/uuZtecVU4/EyTiOz9QVX6uwnroaPgmCse2xGG/Yz3cV\\nJ0n+E8WhYnx3GgPxBoHdvF7Kw1KXpjktezEfEOz1OFa2+L5ejqTtQ5rsz0R5KNV6\\nHE/UDBwY44qyAjsNXoWHykSu4BWugBsoh+aOb9zbStkyNYVoSX050Jtk5BM/zJkB\\nSGWtdCazAgMBAAECggEABupV4VbcwY7MCuOp0v8z5eB46od/sbI+eLYzallvU4v+\\nY99ghZ6VfUJkh5C0QUVj9wM8/lfKoXaYdKL18pwacJedjT71kH4C9YHUlE0uKDmr\\nntNY4aQAfMdJjW9H/uiRknJ7/YmHOAxoBBb/hIdjC762+BvO+v8VKIyqE+99Z0jV\\nWqVnFt90pyxmWDF0qJhHbpqS5elKa1jAOZxE7k7EmRegVKhnYCKKWKKSvF8n596R\\ntkgrw5zWGsICJlyeXUUEcf+KC2Kcn1423YAxgCHHwtyBWyXk9huGFRE01lpTCD4d\\nYCdcn4R3xEki6B7+XqU7W6IWb44wdSTwUC1K5YteYQKBgQDOsAfd84VqoNnuwAD9\\nG/zYJPGEKJzvz90ENCU6ZI4czyRtN5nCByHp335jHtZCSrNAU8dqSpBTyc1j9KMY\\nA5VIR6kmV0uJM3PuxmnPgj8wA7WZ+vp4VMviBlCXxIwR7R1wqMvzgEd5M2TJrhvB\\nOCnIoSCnyCAeBOSTf+Gwuy2SqwKBgQC6U8x60R5D9M0Z2geoT86lFUvQFaMu+MJV\\nOG7lSjz1I+mH1MRne7dnLKxj4iYkm3tdDEzlm/i4P4TRE+bIA8k736usXLIggcwq\\nFSh5YXC0n/LWD/o2SUWFtuZWct5ZTg/9aUt9i7bPkO95954r8brP4n4JkO3gqo67\\nJJX5iOJ8GQKBgQCTjtDPAEBLs7Ji5OjPyt9kYFucgnIoMzoS+jdpzMg4gRn8byly\\ngC0SDuDoWueUREhcsHM5yynm57eemNSnHEfDZoW4PbJLrVQjL7vyzYXW/Y70811F\\n8yPrpZ57+3IUijfualPQ79AXEz3tTkO6WiJafc4WeqWTSOL2+uFhjwAmKQKBgBK6\\n8cc21lAGf8elfzeQLjmyFljok+rY3tAqSBuMhuwtnAAnh0bPzPP2La4swaDUcGY+\\nIkzCjRIYcIWD9qMMnmICbgN5nf5ejeN9FQB+pxHBMmwKVyC15OM4K5dtHKTlj/3t\\nY8VPEiVzcF9WYPQR7LGRFxJnG0KGYqq1Vs4q0HmhAoGBAKPKfHbAgGvVjOqAQzuh\\nAVGCVHNQtjDxGnzqztklJV9tBw0iQQvPuPU99sPwSr9bjLjnTxDwju2iVerHg0Fz\\nHYy59l3HI2mJuCISgURdmMr+aRnDjRZN66uEvjfs9FGnfk0DcwrjWnDJZzIv/iAy\\nSzOXiqEv/yj3YQubkW9s9kqM\\n-----END PRIVATE KEY-----\\n\",
  \"client_email\": \"veads-752@veads-239413.iam.gserviceaccount.com\",
  \"client_id\": \"109210758011167435330\",
  \"auth_uri\": \"https://accounts.google.com/o/oauth2/auth\",
  \"token_uri\": \"https://oauth2.googleapis.com/token\",
  \"auth_provider_x509_cert_url\": \"https://www.googleapis.com/oauth2/v1/certs\",
  \"client_x509_cert_url\": \"https://www.googleapis.com/robot/v1/metadata/x509/veads-752%40veads-239413.iam.gserviceaccount.com\"
}\n";

        file_put_contents(storage_path('app/service-account-credentials.json'), $service_account_content);

        // 6. Create 'installed' in 'storage/app'
        touch(storage_path('app/installed'));

        return redirect('/');
    }

    private function getView($step) {
        if (!session()->has('details')) {
            session()->put('details', new WizardDetails());
            return redirect('/wizard/intro');
        }

        $details = session()->get('details');

        if ($step == 'done') {
            return $this->showDone($details);
        }

        return view('wizard.' . $step, compact('details'));
    }

    private function showDone(WizardDetails $details) {
        if (empty($details->getAppName()) || empty($details->getAppUrl())) {
            return redirect('/wizard/app');
        }

        if (empty($details->getDbHost()) || empty($details->getDbPort()) || empty($details->getDbUser()) || empty($details->getDbPass()) || empty($details->getDbName())) {
            return redirect('/wizard/database');
        }

        if (empty($details->getMailDriver())) {
            return redirect('/wizard/mail');
        }

        if ($details->getMailDriver() == 'smtp' && (empty($details->getMailHost()) || empty($details->getMailPort()))) {
            return redirect('/wizard/mail');
        }

        if (empty($details->getMailFromAddress()) || empty($details->getMailFromName())) {
            return redirect('/wizard/mail');
        }

        if (empty($details->getFbAppId()) || empty($details->getFbAppSecret())) {
            return redirect('/wizard/facebook');
        }

        if (empty($details->getInstaClientId()) || empty($details->getInstaClientSecret())) {
            return redirect('/wizard/instagram');
        }

        if (empty($details->getMollieKey())) {
            return redirect('/wizard/mollie');
        }

        if (empty($details->getAnalyticsTrackingId()) || empty($details->getAnalyticsViewId())) {
            return redirect('/wizard/analytics');
        }

        return view('wizard.done', compact('details'));
    }

    private function storeDetails($request, $next) {
        if (!session()->has('details')) {
            return redirect('/wizard/intro');
        }

        $details = session()->get('details');
        $details->append($request->validated());
        session()->put('details', $details);

        return redirect('/wizard/' . $next);
    }
}
