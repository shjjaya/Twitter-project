<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            static $types = ['App\Tweet', 'App\Comment'];
            for($i=0; $i<1000; $i++) {
                DB::table('likes')->insert([
                    'user_id'       =>  mt_rand(1, 1000),
                    'likeable_id'   =>  mt_rand(1, 1000),
                    'likeable_type' =>  $types[mt_rand(0, 1)],
                    'created_at'    =>  DB::raw('now()'),
                    'updated_at'    =>  DB::raw('now()')
                ]);
            }
    }
    // $GLOBALS['likeCount'] = (int)$this->command->ask('How many Likes?');
    //     $this->command->info('Generating ' . $GLOBALS['likeCount'] . ' Likes');
    //     factory(App\Like::class, $GLOBALS['likeCount'])->create();
    //     $this->command->info('Likes created!');
}
