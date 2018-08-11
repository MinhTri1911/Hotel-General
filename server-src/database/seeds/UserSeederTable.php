<?php

use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();
        $faker = Faker\Factory::create();
        $user = new \App\Models\User;
        $user->name = $faker->name;
        // $user->email = $faker->unique()->safeEmail;
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(10);
        $user->save();
    }
}
