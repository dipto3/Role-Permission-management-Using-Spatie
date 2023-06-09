<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user =User::where('email','diptoguho4@gmail.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Piyal Guho Dipto";
            $user->email = "diptoguho4@gmail.com";
            $user->password = Hash::make('123456');
            $user->save();
        }

    }
}
