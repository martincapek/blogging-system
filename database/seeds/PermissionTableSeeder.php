<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->everything();


        Bouncer::assign('admin')->to(\App\User::find(1));
        Bouncer::assign('moderator')->to(\App\User::find(2));
        Bouncer::assign('guest')->to(\App\User::find(3));
    }
}
