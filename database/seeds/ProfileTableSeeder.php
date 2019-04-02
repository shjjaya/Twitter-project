<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<1000; $i++) {
            DB::table('profiles')->insert([
                'user_id'       =>  $i,
                'bio'           =>  messageText(),
                'location'      =>  Str::random(mt_rand(8, 12)),
                'birthday'      =>  Carbon::create(mt_rand(2017,2019), mt_rand(1, 12), mt_rand(1, 28)),
                'avatar'        =>  '',
                'created_at'    =>  DB::raw('now()'),
                'updated_at'    =>  DB::raw('now()')
            ]);
        }
    }
    // $this->command->info('Generating ' . $GLOBALS['userCount'] . ' Profiles');
    // factory(App\Profile::class, $GLOBALS['userCount'])->create();
    // $this->command->info('Profiles created');
}
