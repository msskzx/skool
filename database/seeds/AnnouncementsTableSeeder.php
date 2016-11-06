<?php

use Illuminate\Database\Seeder;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('announcements')->insert([
          'title' => 'Hellow World',
          'admin_id' => '1'
      ]);
    }
}
