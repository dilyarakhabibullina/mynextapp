<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       \DB::table('news')->insert($this->getData());
           }
           public function getData() {
            $newsqty=20;
            $news=[];
            for($i=0; $i<$newsqty; $i++) {
                $news[] = [
                    'category_id' => rand(1, 5),
                    'title' => fake()->jobTitle(),
                    'text' => fake()->text(100),
                    'author' => fake()->userName(),
                    'isPrivate' =>fake()->boolean(),
                ];
            }
    
            return $news;
        }
    }