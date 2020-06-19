<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teachers')->insert(
        [
            ['name' => 'Muhammad', 'email' => 'muhammad@gmail.com', 'status' => 'active'],
            ['name' => 'Zuhaib', 'email' => 'zuhaib@gmail.com', 'status' => 'active'],
            ['name' => 'Zaid', 'email' => 'zaid@gmail.com', 'status' => 'active']
        ]
        );
    }
}
