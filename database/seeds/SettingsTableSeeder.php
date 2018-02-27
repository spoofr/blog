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
            'site_name' => $user->id,
            'contact_number' => 'avatar.jpg',
            'contact_email' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque animi excepturi inventore adipisci nesciunt soluta assumenda amet eveniet cupiditate minus corporis illum natus cum, ipsa repellendus delectus fuga harum consectetur.',
            'address' => 'twitter.com'
        ]);
    }
}
