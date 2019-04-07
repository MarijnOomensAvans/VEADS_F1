<?php

namespace App\Console\Commands;

use App\EditableContentCategory;
use App\EditContent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeKeyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:content_key {key : Content key} {type : Content type} {category : Content category or page} {title : Content title (visible in backend)} {--d|default= : Default content value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new edit content key in the database seeder';

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
        $content = EditContent::find($this->argument('key'));

        if (!empty($content)) {
            $this->error('Key is already in use.');
            return;
        }

        $accepted_types = ['text', 'textarea', 'image', 'checkbox'];

        if (!in_array($this->argument('type'), $accepted_types)) {
            $this->error('Type must be one of ' . implode(', ', $accepted_types));
            return;
        }

        $accepted_categories = EditableContentCategory::pluck('category')->toArray();

        if (!in_array($this->argument('category'), $accepted_categories)) {
            $this->error('Category must be one of ' . implode(', ', $accepted_categories));
            return;
        }

        $key = $this->argument('key');
        $type = $this->argument('type');
        $title = $this->argument('title');
        $category = $this->argument('category');
        $default = $this->option('default') ?? '';

        $seeder = file_get_contents(base_path('database/seeds/EditableContentsSeeder.php'));

        $seeder = str_replace("// DO NOT TOUCH THIS LINE\n", "if (empty(\App\EditContent::find('$key'))) {
            (new \App\EditContent(['key' => '$key', 'title' => '$title', 'type' => '$type', 'content' => '$default', 'category' => '$category']))->save();
        }
        
        // DO NOT TOUCH THIS LINE
", $seeder);

        file_put_contents(base_path('database/seeds/EditableContentsSeeder.php'), $seeder);

        Artisan::call('db:seed');

        $this->info('Done.');
    }
}
