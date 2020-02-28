<?php

use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->delete();
        
        $faculties = [
            ['name'=>'Faculty of Science'],
            ['name'=>'Faculty of Medicine'],
            ['name'=>'Faculty of Engineering'],
            ['name'=>'Faculty of Dental Sciences'],
            ['name'=>'Faculty of Arts'],
            ['name'=>'Faculty of Agriculture'],
            ['name'=>'Faculty of Allied Health Sciences'],
            ['name'=>'Faculty of Veterinary Medicine and Animal Science']
            ];

        DB::table('faculties')->insert($faculties);
    }
}
