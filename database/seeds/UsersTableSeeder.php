<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('users')->insert([
        'name'      =>  'Jaya',
        'email'     =>  'jaya@gmail.ca',
        'password'  =>  bcrypt('111111'),
        'created_at'=>  DB::raw('now()'),
        'updated_at'=>  DB::raw('now()'),
    ]);

    for($i=0; $i<500; $i++) {
            DB::table('users')->insert([
                'name'          => Str::random(mt_rand(4, 10)) . ' ' . Str::random(mt_rand(2, 4)),
                'email'         => Str::random(mt_rand(10, 16)) . '@google.ca',
                'password'      => bcrypt(Str::random(mt_rand(6, 12))),
                'created_at'    => DB::raw('now()'),
                'updated_at'    => DB::raw('now()')
            ]);
        }
    }
    // $GLOBALS['userCount'] = (int)$this->command->ask('How many Users?');
    // $this->command->info('Generating ' . $GLOBALS['userCount'] . ' Users');
    // $users = factory(App\User::class, $GLOBALS['userCount'])->create();
    // $this->command->info('Users created!');
}
