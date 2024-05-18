<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        
        $user->name = 'Victor Arana';
        $user->email = 'victor@gmail.com';
        $user->password = bcrypt('12345678');

        $user->save();


        $user = new User();

        $user->name = 'Jose Luis';
        $user->email = 'Jos@gmail.com';
        $user->password = bcrypt('10011001');

        $user->save();


        $user = new User();

        $user->name = 'Nico';
        $user->email = 'nico@gmail.com';
        $user->password = bcrypt('10011001');

        $user->save();
    }
}
