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
        $categories = [
            'homepagina',
            'evenementen',
            'projecten',
            'contact',
            'footer',
            'win-win'
        ];

        foreach($categories as $category) {
            if (!empty(EditableContentCategory::where('category', $category)->first())) {
                print("Skipping EditContentCategory " . $category . ", because this category is already seeded\n");
                continue;
            }

            $cat = new EditableContentCategory([
                'category' => $category
            ]);
            $cat->save();
        }
    }
}
