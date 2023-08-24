<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

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
            ['over_name' => 'テスト',
            'under_name' => 'ユーザー',
            'over_name_kana' => 'テスト',
            'under_name_kana' => 'ユーザー',
            'mail_address' => 'test@test',
            'sex' => 1,
            'birth_day' => '1993-11-01',
            'role' => 4,
            'password' => bcrypt('test1101'),
            ]
        ]);
    }
}
