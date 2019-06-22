<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'company' => 1,
            'first_name' => 'admin',
            'last_name' => 'admin', 
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'company' => 1,
            'first_name' => 'employee',
            'last_name' => 'employee', 
            'email' => 'employee@employee.com',
            'role' => 'employee',
            'password' => bcrypt('password'),
        ]);
    }
}
