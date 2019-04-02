<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {

        function messageText() {
            $count = mt_rand(5, 30);
            $text  = '';
            for($i=0; $i<$count; $i++) {
            $text .= Str::random(mt_rand(2, 10)) .'';
            }
            return $text;
    }

        $this->call(CommentsTableSeeder::class);
        $this->call(FollowersTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TweetsTableSeeder::class);

        // $this->call(GroupTableSeeder::class);

    }
}
