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
        DB::table('students')->insert([
            "name"=>"Mitali Nahata",
            "age"=>10,
            "gender"=>"Female",
            "email"=>"mitali@gmail.com",
            "phone"=>"123456789",
            "address"=>"Malad East",
            "class"=>"Eight"
        ]);
    }
}
