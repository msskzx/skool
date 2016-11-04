<?php

use Illuminate\Database\Seeder;

class ParenttsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parentts')->insert([
          'first_name' => 'Bear',
          'email' => 'msskzx@msskzx.com',
          'username' => 'msskzx'
      ]);
    }
}
