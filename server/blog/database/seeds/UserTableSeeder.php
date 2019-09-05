<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::create(['name'=>'john','email'=>'john@gmail.com','password'=>Hash:make('12345'),'remember_token'=>str_random(10)]);
        // $this->call(UsersTableSeeder::class);
    }
}
