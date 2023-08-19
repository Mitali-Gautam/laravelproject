<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//use Illuminate\Database\StudentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            StudentSeeder::class,
            PublisherSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
        ]);
    }
}
