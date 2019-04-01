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

        if (empty(\App\EditContent::find('contact_show_team'))) {
            (new \App\EditContent(['key' => 'contact_show_team', 'title' => 'Ons team weergeven', 'type' => 'checkbox', 'content' => '', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('contact_show_form'))) {
            (new \App\EditContent(['key' => 'contact_show_form', 'title' => 'Contactformulier weergeven', 'type' => 'checkbox', 'content' => '', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('contact_header'))) {
            (new \App\EditContent(['key' => 'contact_header', 'title' => 'Header afbeelding', 'type' => 'image', 'content' => '', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('event_title'))) {
            (new \App\EditContent(['key' => 'event_title', 'title' => 'Pagina titel', 'type' => 'text', 'content' => '', 'category' => 'evenementen']))->save();
        }
        
        if (empty(\App\EditContent::find('contact_title'))) {
            (new \App\EditContent(['key' => 'contact_title', 'title' => 'Pagina titel', 'type' => 'text', 'content' => '', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('event_header'))) {
            (new \App\EditContent(['key' => 'event_header', 'title' => 'Header afbeelding', 'type' => 'image', 'content' => '', 'category' => 'evenementen']))->save();
        }
        
        if (empty(\App\EditContent::find('event_show_breadcrumb'))) {
            (new \App\EditContent(['key' => 'event_show_breadcrumb', 'title' => 'Breadcrumb weergeven', 'type' => 'checkbox', 'content' => '', 'category' => 'evenementen']))->save();
        }
        
        if (empty(\App\EditContent::find('home_header'))) {
            (new \App\EditContent(['key' => 'home_header', 'title' => 'Header afbeelding', 'type' => 'image', 'content' => '', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_title'))) {
            (new \App\EditContent(['key' => 'home_title', 'title' => 'Pagina titel', 'type' => 'text', 'content' => '', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_show_partners'))) {
            (new \App\EditContent(['key' => 'home_show_partners', 'title' => 'Partners weergeven', 'type' => 'checkbox', 'content' => '', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_video_url'))) {
            (new \App\EditContent(['key' => 'home_video_url', 'title' => 'Youtube video url', 'type' => 'text', 'content' => '', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_show_events'))) {
            (new \App\EditContent(['key' => 'home_show_events', 'title' => 'Evenementen weergeven', 'type' => 'checkbox', 'content' => '', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('event_intro'))) {
            (new \App\EditContent(['key' => 'event_intro', 'title' => 'Intro tekst', 'type' => 'textarea', 'content' => '', 'category' => 'evenementen']))->save();
        }
        
        // DO NOT TOUCH THIS LINE
    }
}
