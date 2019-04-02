<?php

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=0; $i<1000; $i++) {
            DB::table('tweets')->insert([
                'user_id' => mt_rand(1, 500),
                'body'    => messageText()
            ]);
        }
    }
}
