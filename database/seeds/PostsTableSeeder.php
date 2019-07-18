<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();   // oppure $faker = Faker::create(it_IT); in italiano
        for ($i=0; $i < 15; $i++) {
          $post = new Post();
          $post->title = $faker->sentence();
          $post->content = $faker->text(2000);
          $post->author = $faker->firstName . ' ' . $faker->lastName;
          $post->slug = Str::slug($post->title);    // il - che mi mette nello slug è di default, altrimenti potevo scrivere Str::slug($post->title, '-');
          $post->save();
        }
    }
}
