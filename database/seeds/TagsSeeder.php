<?php

use Illuminate\Database\Seeder;
use Tags\Models\Tags;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) {
            $tag  = new Tags();
            $tag->title = 'Tag No.'.$i;
            $tag->content = 'Tag Content '.$i;
            $tag->save();
        }
    }
}
