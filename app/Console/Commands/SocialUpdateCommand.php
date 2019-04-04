<?php

namespace App\Console\Commands;

use App\FacebookPage;
use App\FacebookPost;
use App\Services\FacebookService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SocialUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'social:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update social posts in de database';

    /**
     * @var FacebookService
     */
    private $facebookService;

    /**
     * Create a new command instance.
     *
     * @param FacebookService $facebookService
     * @return void
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

        $created = 0;
        $updated = 0;

        foreach($pages as $page) {

            $response = $fb->get('/' . $page->id . '/feed?fields=full_picture,message,link,created_time&limit=5', $page->access_token);

            $posts = $response->getGraphEdge()->asArray();

            if (count($posts) > 0) {
                foreach($posts as $post) {
                    $p = FacebookPost::find($post['id']);
                    $updated++;

                    if (empty($p)) {
                        $p = new FacebookPost();
                        $created++;
                        $updated--;
                    }

                    $p->fill([
                        'id' => $post['id'],
                        'page_id' => $page->id,
                        'image_url' => $post['full_picture'] ?? '',
                        'message' => $post['message'] ?? '',
                        'url' => $post['link'] ?? '',
                        'created_at' => $post['created_time']
                    ]);
                    $p->save();
                }
            }
        }

        $this->info('Done. Created ' . $created . ' posts, updated ' . $updated . ' posts.');
    }
}
