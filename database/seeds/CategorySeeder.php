<?php

use Categories\Models\Categories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) {
            $category  = new Categories();
            $category->title = 'Category No.'.$i;
            $category->content = 'Category Content '.$i;
            $category->save();
        }
    }
}
