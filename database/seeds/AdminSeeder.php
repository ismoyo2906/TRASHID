<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nameLevel' => "Super Admin",
            'level' => "admin",
            'email' => "sadmin@mail.com",
            'password' => bcrypt('12345678')
        ]);

        Admin::create([
            'nameLevel' => "admin",
            'level' => "admin",
            'email' => "admin@mail.com",
            'password' => bcrypt('12345678')
        ]);
    }
}
