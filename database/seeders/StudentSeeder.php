<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //without using faker
        /*DB::table('students')->insert([
            "name"=>"Mitali Nahata",
            "age"=>10,
            "gender"=>"Female",
            "email"=>"mitali@gmail.com",
            "phone"=>"123456789",
            "address"=>"Malad East",
            "class"=>"Eight"
        ]);*/

        $faker = \Faker\Factory::create();
        DB::table('students')->insert([
            "name"=>$faker->name,
            "age"=>$faker->numberBetween($min = 2, $max = 18),
            "gender"=>$faker->randomElement($array = array ('female','male')),
            "email"=>$faker->safeEmail,
            "phone"=>$faker->phoneNumber,
            "address"=>$faker->address,
            "class"=>$faker->text($maxNbChars = 100)
        ]);
    }
}
