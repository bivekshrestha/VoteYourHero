<?php

namespace Database\Seeders;

use App\Models\Admin;
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
           'name' => 'Admin',
           'email' => 'admin@hero.com',
           'password' => bcrypt('admin@123')
        ]);
    }
}
