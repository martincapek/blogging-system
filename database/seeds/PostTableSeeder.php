<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            \App\Post::create([
                'title' => $faker->text(30),
                'perex' => $faker->text(200),
                'text' => $faker->text(2000),
                'image' => '/media/images/placeholder.jpg',
                'views' => 0,
                'author_id' => 1,
                'category_id' => 1,
                'created_at' => \Carbon\Carbon::now()
            ]);
        }


        \App\Category::create([
            'name' => 'Uncategorized'
        ]);
    }
}
