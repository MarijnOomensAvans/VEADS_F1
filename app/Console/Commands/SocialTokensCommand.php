<?php

namespace App\Console\Commands;

use App\FacebookPage;
use App\Services\FacebookService;
use Illuminate\Console\Command;

class SocialTokensCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'social:tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh facebook page access tokens';

    /**
     * @var FacebookService
     */
    private $facebookService;

    /**
     * Create a new command instance.
     *
     * @param FacebookService $facebookService
     */
    public function __construct(FacebookService $facebookService)
    {
        $this->facebookService = $facebookService;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pages = FacebookPage::whereNotNull('access_token')->get();

        $fb = $this->facebookService->getFacebookClient();
        $oAuth2Client = $fb->getOAuth2Client();

        foreach($pages as $page) {
            $page->access_token = $oAuth2Client->getLongLivedAccessToken($page->access_token);
            $page->save();
        }

        $this->info('Done.');
    }
}
