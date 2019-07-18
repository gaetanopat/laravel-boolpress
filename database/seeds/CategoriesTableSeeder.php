<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categorie = ['Informatica', 'Tempo libero', 'Sport', 'Blog'];
      foreach ($categorie as $categoria) {
        $nuova_categoria = new Category();
        $nuova_categoria->name = $categoria;
        $nuova_categoria->slug = Str::slug($nuova_categoria->name);
        $nuova_categoria->save();
      }
    }
}
