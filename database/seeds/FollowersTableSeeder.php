<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<1000; $i++) {
            DB::table('followers')->insert([
                'follower_id' =>mt_rand(1, 1000),
                'leader_id'   =>mt_rand(1, 1000)
            ]);
        }
    }
}
