<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*DB::table('users')->insert([
            'carso' => '00000000',
            'activo' => '1',
            'rol' => 'administrativo',
            'password' => bcrypt('CTINmx2016.'),
        ]); */
        DB::table('users')->insert([
            'carso' => '10000000',
            'activo' => '1',
            'rol' => 'administrativo',
            'password' => bcrypt('CTINmx2016.'),
        ]);
        DB::table('users')->insert([
            'carso' => '20000000',
            'activo' => '1',
            'rol' => 'administrativo',
            'password' => bcrypt('CTINmx2016.'),
        ]);
    }
}
