<?php

use Illuminate\Database\Seeder;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parents')->insert([
          'first_name' => 'Bear',
          'email' => 'msskzx@msskzx.com',
          'username' => 'msskzx'
      ]);
    }
}
