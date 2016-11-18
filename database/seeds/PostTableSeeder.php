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
            DB::table('posts')->insert([
                'name' => $faker->text(30),
                'perex' => $faker->text(200),
                'content' => $faker->text(200),
                'views' => 0,
                'author' => 1,
                'created_at' => \Carbon\Carbon::now()

            ]);
        }
    }
}
