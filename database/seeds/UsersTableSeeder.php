<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Coed',
            'email' => 'name@msadail.com',
            'password' => bcrypt('123456'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'avatar.jpg',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque animi excepturi inventore adipisci nesciunt soluta assumenda amet eveniet cupiditate minus corporis illum natus cum, ipsa repellendus delectus fuga harum consectetur.',
            'twitter' => 'twitter.com'
        ]);
        
        // use Illuminate\Support\Facades\DB;
        // DB::table('users')->insert([
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
    }
}
