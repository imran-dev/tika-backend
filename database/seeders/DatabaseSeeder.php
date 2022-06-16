<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Person;
use App\Models\Upazila;
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
//        Category::factory(25)->create();

        foreach (tika_bd_divisions() as $division) {
            $divisionModel = new Division();
            $divisionModel->id = $division['id'];
            $divisionModel->name = $division['name'];
            $divisionModel->save();
        }

        foreach (tika_bd_districts() as $district) {
            $districtModel = new District();
            $districtModel->id = $district['id'];
            $districtModel->name = $district['name'];
            $districtModel->division_id = $district['division_id'];
            $districtModel->save();
        }

        foreach (tika_bd_upazilas() as $upazila) {
            $upazilaModel = new Upazila();
            $upazilaModel->id = $upazila['id'];
            $upazilaModel->name = $upazila['name'];
            $upazilaModel->district_id = $upazila['district_id'];
            $upazilaModel->save();
        }

        foreach (tika_bd_categories() as $category) {
            $categoryModel = new Category();
            $categoryModel->name = $category['name'];
            $categoryModel->min_age = $category['min_age'];
            $categoryModel->save();
        }
    }
}
