<?php

use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->delete();

        $universities = [
            ['name' =>'University of Peradeniya'],
            ['name' =>'University of Colombo'],
            ['name' =>'Eastern University'],
            ['name' =>'University of Kelaniya'],
            ['name' =>'University of Moratuwa'],
            ['name' =>'Rajarata University'],
            ['name' =>'University of Ruhuna'],
            ['name' =>'Sabaragamuwa University'],
            ['name' =>'South Eastern University'],
            ['name' =>'University of Sri Jayewardenepura'],
            ['name' =>'Uva Wellassa University'],
            ['name' =>'Wayamba University']
        ];

        DB::table('universities')->insert($universities);
    }
}
