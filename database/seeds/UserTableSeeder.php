<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@blog.cz',
            'password' => Hash::make('admin123'),
            'verified' => 1,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
