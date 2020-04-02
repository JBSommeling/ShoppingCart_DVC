<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create([
            'name' => 'admin',
            'user_id' => 1
        ]);

        Role::create([
            'name' => 'user',
            'user_id' => 2
        ]);
    }
}
