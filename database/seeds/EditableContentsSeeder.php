<?php

use Illuminate\Database\Seeder;

class EditableContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (empty(\App\EditContent::find('projects_header'))) {
            (new \App\EditContent(['key' => 'projects_header', 'title' => 'Header afbeelding', 'type' => 'image', 'content' => '', 'category' => 'projecten']))->save();
        }

        if (empty(\App\EditContent::find('projects_intro'))) {
            (new \App\EditContent(['key' => 'projects_intro', 'title' => 'Intro tekst', 'type' => 'textarea', 'content' => '', 'category' => 'projecten']))->save();
        }

        if (empty(\App\EditContent::find('projects_show_breadcrumb'))) {
            (new \App\EditContent(['key' => 'projects_show_breadcrumb', 'title' => 'Breadcrumb weergeven', 'type' => 'checkbox', 'content' => 'true', 'category' => 'projecten']))->save();
        }

        if (empty(\App\EditContent::find('projects_title'))) {
            (new \App\EditContent(['key' => 'projects_title', 'title' => 'Pagina titel', 'type' => 'text', 'content' => 'Projecten', 'category' => 'projecten']))->save();
        }

        if (empty(\App\EditContent::find('contact_about_us'))) {
            (new \App\EditContent(['key' => 'contact_about_us', 'title' => 'Over ons', 'type' => 'textarea', 'content' => '', 'category' => 'contact']))->save();
        }

        // DO NOT TOUCH THIS LINE
    }
}
