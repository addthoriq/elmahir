<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data     = [
            [
                'role_id'       => 1,
                'name'          => 'Paijo',
                'email'         => 'admin@admin.com',
                'password'      => bcrypt(123),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => 2,
                'name'          => 'Tukiyem',
                'email'         => 'operator1@operator1.com',
                'password'      => bcrypt(123),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => 3,
                'name'          => 'Sukirman',
                'email'         => 'operator2@operator2.com',
                'password'      => bcrypt(123),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
