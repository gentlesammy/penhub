<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'          => 'Sugar Writer',
            'email'         => 'psalmjumia@gmail.com',
            'password'         => bcrypt('IKORODUkometh1984'),
            'role'          => 5,
        ]);
    }
}
