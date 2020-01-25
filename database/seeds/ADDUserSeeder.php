<?php

use Illuminate\Database\Seeder;

class ADDUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => "admin",
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
