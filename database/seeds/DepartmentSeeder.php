<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //department Seeder
        DB::table('departments')->insert(
        [
            ['name' => 'Dep of Computer Science','status' => 'active'],
            ['name' => 'Dep of Social Science','status' => 'active'],
            ['name' => 'Dep of English','status' => 'active'],
            ['name' => 'Dep of Math','status' => 'active'],
            ['name' => 'Dep of Management','status' => 'active']
        ]
        );
    }
}
