<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\InstagramPost;
use App\InstagramPage;

class InstagramUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update instagram posts in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pages = InstagramPage::all();

        foreach ($pages as $page){

            
            $ch = curl_init('https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $page->access_token);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = json_decode(curl_exec($ch));
            curl_close($ch);
            
            foreach ($response->data as $post){

                $p = InstagramPost::find($post->id);

                if (empty($p)) {
                    $p = new InstagramPost();
                }

                $p->fill([
                    'id' => $post->id,
                    'page_name' => $page->name,
                    'image_url' => $post->images->standard_resolution->url,
                    'message' => $post->caption ?? '',
                    'url' => $post->link,
                    'created_at' => $post->created_time
                ]);

                $p->save();
            }

            echo "Done";
        }
    }
}
