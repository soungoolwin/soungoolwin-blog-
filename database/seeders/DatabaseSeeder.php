<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Blog::truncate();
        Photo::truncate();
        Category::truncate();

        $mgmg=User::factory()->create(['name'=>'mgmg']);
        $zawzaw=User::factory()->create(['name'=>'zawzaw']);
        
        $frontend=Category::factory()->create(['name'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend']);

        Blog::factory(5)->create(['user_id'=>$mgmg->id,'category_id'=>$frontend->id,'image'=>'https://i.ibb.co/Kb95WX3/effects-tried-0-photos-added-0-origin-gallery-total-effects-actions-0-remix-data-tools-used-tilt-shi.jpg"']);
        Blog::factory(5)->create(['user_id'=>$zawzaw->id,'category_id'=>$backend->id,'image'=>'https://i.ibb.co/Kb95WX3/effects-tried-0-photos-added-0-origin-gallery-total-effects-actions-0-remix-data-tools-used-tilt-shi.jpg"']);


        $photo = new Photo();
        $photo->create(['name'=>'myit-sone','source'=>'https://i.ibb.co/Kb95WX3/effects-tried-0-photos-added-0-origin-gallery-total-effects-actions-0-remix-data-tools-used-tilt-shi.jpg"']);
        $photo->create(['name'=>'myit-sone','source'=>'https://i.ibb.co/Kb95WX3/effects-tried-0-photos-added-0-origin-gallery-total-effects-actions-0-remix-data-tools-used-tilt-shi.jpg"']);
    }
}
