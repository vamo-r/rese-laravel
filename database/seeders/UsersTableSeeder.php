<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'guest',
            'email' => 'guest@user.com',
            'password' => 'giMuEUX0#x_&',
        ];
        DB::table('users')->insert($param);
    }
}
