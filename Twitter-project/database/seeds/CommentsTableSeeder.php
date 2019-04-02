<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<5000; $i++) {
            DB::table('comments')->insert([
                'user_id'       =>  mt_rand(1, 500),
                'tweet_id'      =>  mt_rand(1, 2000),
                'body'          =>  messageText(),
                'created_at'    =>  DB::raw('now()'),
                'updated_at'    =>  DB::raw('now()'),
            ]);
        }
    }

    // $GLOBALS['commentCount'] = (int)$this->command->ask('How many Comments?');
    //     $this->command->info('Generating ' . $GLOBALS['commentCount'] . ' Comments');
    //     factory(App\Comment::class, $GLOBALS['commentCount'])->create();
    //     $this->command->info('Comments created!');
}
