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
            (new \App\EditContent(['key' => 'contact_about_us', 'title' => 'Over ons', 'type' => 'textarea', 'content' => 'Stichting Veads vindt het belangrijk dat mensen mee tellen en mee kunnen doen ongeacht de omstandigheden en financiële positie. Het mag niet zo zijn dat iemand door wat voor omstandigheden dan ook in een sociaal isolement raakt. Veads gelooft als je vroegtijdig signaleert dat mensen in een sociaal isolement dreigen te raken je meer mensen kan bereiken, dan als je een groep meteen een stempel op drukt in wat voor situatie ze verkeren. Niemand wil minderbedeeld of kans arm zijn. Kansrijk is een betere benaming die bij iedereen past.', 'category' => 'contact']))->save();
        }

        if (empty(\App\EditContent::find('contact_show_team'))) {
            (new \App\EditContent(['key' => 'contact_show_team', 'title' => 'Ons team weergeven', 'type' => 'checkbox', 'content' => 'true', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('contact_show_form'))) {
            (new \App\EditContent(['key' => 'contact_show_form', 'title' => 'Contactformulier weergeven', 'type' => 'checkbox', 'content' => 'true', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('contact_header'))) {
            (new \App\EditContent(['key' => 'contact_header', 'title' => 'Header afbeelding', 'type' => 'image', 'content' => '', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('event_title'))) {
            (new \App\EditContent(['key' => 'event_title', 'title' => 'Pagina titel', 'type' => 'text', 'content' => 'Evenementen', 'category' => 'evenementen']))->save();
        }
        
        if (empty(\App\EditContent::find('contact_title'))) {
            (new \App\EditContent(['key' => 'contact_title', 'title' => 'Pagina titel', 'type' => 'text', 'content' => 'Contact', 'category' => 'contact']))->save();
        }
        
        if (empty(\App\EditContent::find('event_header'))) {
            (new \App\EditContent(['key' => 'event_header', 'title' => 'Header afbeelding', 'type' => 'image', 'content' => '', 'category' => 'evenementen']))->save();
        }
        
        if (empty(\App\EditContent::find('event_show_breadcrumb'))) {
            (new \App\EditContent(['key' => 'event_show_breadcrumb', 'title' => 'Breadcrumb weergeven', 'type' => 'checkbox', 'content' => 'true', 'category' => 'evenementen']))->save();
        }
        
        if (empty(\App\EditContent::find('home_header'))) {
            (new \App\EditContent(['key' => 'home_header', 'title' => 'Header afbeelding', 'type' => 'image', 'content' => '', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_title'))) {
            (new \App\EditContent(['key' => 'home_title', 'title' => 'Pagina titel', 'type' => 'text', 'content' => 'VEADS', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_show_partners'))) {
            (new \App\EditContent(['key' => 'home_show_partners', 'title' => 'Partners weergeven', 'type' => 'checkbox', 'content' => 'true', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_video_url'))) {
            (new \App\EditContent(['key' => 'home_video_url', 'title' => 'Youtube video url', 'type' => 'text', 'content' => 'https://www.youtube.com/embed/qpDNXX1Gm-Y', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('home_show_events'))) {
            (new \App\EditContent(['key' => 'home_show_events', 'title' => 'Evenementen weergeven', 'type' => 'checkbox', 'content' => 'true', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('event_intro'))) {
            (new \App\EditContent(['key' => 'event_intro', 'title' => 'Intro tekst', 'type' => 'textarea', 'content' => '', 'category' => 'evenementen']))->save();
        }
        
        if (empty(\App\EditContent::find('home_intro'))) {
            (new \App\EditContent(['key' => 'home_intro', 'title' => 'Intro tekst', 'type' => 'textarea', 'content' => '', 'category' => 'homepagina']))->save();
        }
        
        if (empty(\App\EditContent::find('footer_logo'))) {
            (new \App\EditContent(['key' => 'footer_logo', 'title' => 'Logo', 'type' => 'image', 'content' => '', 'category' => 'footer']))->save();
        }
        
        if (empty(\App\EditContent::find('footer_quote'))) {
            (new \App\EditContent(['key' => 'footer_quote', 'title' => 'Quote', 'type' => 'text', 'content' => '', 'category' => 'footer']))->save();
        }
        
        if (empty(\App\EditContent::find('footer_facebook_link'))) {
            (new \App\EditContent(['key' => 'footer_facebook_link', 'title' => 'Facebook link', 'type' => 'text', 'content' => '', 'category' => 'footer']))->save();
        }
        
        if (empty(\App\EditContent::find('footer_instagram_link'))) {
            (new \App\EditContent(['key' => 'footer_instagram_link', 'title' => 'Instagram link', 'type' => 'text', 'content' => '', 'category' => 'footer']))->save();
        }
        
        // DO NOT TOUCH THIS LINE
    }
}
