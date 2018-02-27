<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'BLXG',
            'contact_number' => '012 3456 7890',
            'contact_email' => 'admin@hello.com',
            'address' => 'Makkah'
        ]);
    }
}
