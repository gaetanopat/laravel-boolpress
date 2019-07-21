<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = ['Fitness', 'Workout', 'Photography', 'Football'];
      foreach ($tags as $tag) {
        $nuovo_tag = new Tag();
        $nuovo_tag->name = $tag;
        $nuovo_tag->slug = Str::slug($nuovo_tag->name);
        $nuovo_tag->save();
      }
    }
}
