<?php

use Ads\Models\Ads;
use Ads\Models\AdTag;
use App\User;
use Categories\Models\Categories;
use Illuminate\Database\Seeder;
use Tags\Models\Tags;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id')->toArray();
        $categories = Categories::pluck('id')->toArray();
        $tags = Tags::pluck('id')->toArray();

        if (count($users) > 0 && count($categories) > 0 && count($tags) > 0) {
            $user_rand = array_rand($users,1);
            $category_rand = array_rand($categories,1);
            $tag_rand = array_rand($tags,1);

            for ($i=1; $i <= 10; $i++) {
                $ads = new Ads();
                $ads->title = 'Ad Title '.$i;
                $ads->content = 'Ad Content '.$i;
                $ads->type = rand(0, 1) ? 'Free' : 'Paid';
                $ads->user_id = $users[$user_rand];
                $ads->category_id = $categories[$category_rand];
                $ads->start_date = date('Y-m-d H:i:s');
                $ads->save();

                $ad_tags = new AdTag();
                $ad_tags->ad_id = $ads->id;
                $ad_tags->tag_id = $tags[$tag_rand];
                $ad_tags->save();
            }
        }
    }
}
