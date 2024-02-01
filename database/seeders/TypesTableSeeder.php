<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names       = ['java', 'javascript', 'vue', 'vite', 'php', 'laravel'];
        $typologies  = ['front-end', 'back-end', 'full-stack']; 

        foreach ($names as $name) {

          $type            = new Type(); 
          $type->name      = $name;
          $type->slug      = Str::slug($type->name);
          $tipology        = array_rand($typologies, 1);
          $type->typology  = $typologies[$tipology];
          $type->save();
        }
        

    }
}
