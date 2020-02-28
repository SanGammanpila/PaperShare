<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->delete();

       $categories = [
           ['name' => 'Mathematics'],
           ['name' => 'Computer Science'],
           ['name' => 'Biology'],
           ['name' => 'Geology'],
           ['name' => 'Physics'],
       ];

       DB::table('categories')->insert($categories);
    }
}
