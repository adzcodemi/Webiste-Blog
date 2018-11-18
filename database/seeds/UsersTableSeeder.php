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
        $user = App\User::create([
            'name'=>'admin',
            'email'=>'admin@dev.com',
            'password'=>bcrypt('admin123'),
            'admin'=>1
        ]);


        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/avatar.png',
            'about'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad excepturi placeat fugit animi sunt, vitae quam. Similique eligendi nam asperiores, fugit sint labore veniam nihil praesentium, nesciunt, quisquam iure. Nulla!',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'

        ]);
        
    }



}
