<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Robby Gustian',
            'username'=>'robbytian',
            'email'=>'akun1@gmail.com',
            'password'=>bcrypt('password')
        ]);

        Profile::create([
            'bio'=>'hei',
            'user_id'=>$user->id
        ]);

        $user2 = User::create([
            'name'=>'Bang Bob',
            'username'=>'bangBob',
            'email'=>'akun2@gmail.com',
            'password'=>bcrypt('password')
        ]);

        Profile::create([
            'bio'=>'hei',
            'user_id'=>$user2->id
        ]);
    }
}
