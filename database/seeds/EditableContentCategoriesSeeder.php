<?php

use App\EditableContentCategory;
use Illuminate\Database\Seeder;

class EditableContentCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (EditableContentCategory::count() > 0) {
            print("Skipping EditableContentCategory, because table is already seeded\n");
            return;
        }

        $categories = [
            'homepagina',
            'evenementen',
            'projecten',
            'contact',
            'footer'
        ];

        foreach($categories as $category) {
            $cat = new EditableContentCategory([
                'category' => $category
            ]);
            $cat->save();
        }
    }
}
