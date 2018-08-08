<?php

use Illuminate\Database\Seeder;
use Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
			'name'     => 'Dev Transoft',
			'email'    => 'dev.transoft@gmail.com',
			'password' =>  Hash::make('123456'),
			'phone'    => '0123456789'
			'avatar'   => '1.png'
        ]);

    }
}
