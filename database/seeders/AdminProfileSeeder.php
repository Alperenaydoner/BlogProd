<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->first_name = 'Alperen';
        $user->last_name = 'Alperen';
        $user->email = 'Alperen.aydoner29@gamil.com';
        $user->password = Hash::make('!!Alperen1234!!');
        $user->email_verified_at = now();
        $user->save();
    }
}
