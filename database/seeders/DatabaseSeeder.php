<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->name = 'Imran Hossain';
        $user->email = 'imrancse019@gmail.com';
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->remember_token = Str::random(10);
        $user->save();

        Person::factory(35)->create();
        Category::factory(25)->create();
    }
}
