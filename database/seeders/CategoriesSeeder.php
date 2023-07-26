<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getCategoriesData());
    }

    private function getCategoriesData() {
        $categoriesData = [
            [
              
            'categories' => 'Sport',
            'slug' => 'sport',
            'created_at' => now(),

            ],
        
            [
           
            'categories' => 'Cult',
            'slug'=>'culture',
            'created_at' => now(),
        ],
    
            [
            
            'categories' => 'Economy',
            'slug'=>'economy',
            'created_at' => now(),]
            ,   
            [
           
            'categories' => 'Country',
            'slug'=>'country',
            'created_at' => now(),],
            [
            
            'categories' => 'World',
            'slug'=>'world',
            'created_at' => now(),]
             ];
    
        


        // $faker = Faker\Factory::create('ru_RU');
        // $categoriesData[]=[
        //     'categories' => $faker->realText(10),
        //     'slug' => $faker->realText(10)];

        return $categoriesData;
    }
}

