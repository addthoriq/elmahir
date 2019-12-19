<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker 		= Factory::create('id_ID');
        $data     = [
            [
                'role_id'       => 1,
                'nip'           => $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
                'name'          => 'Paijo',
                'email'         => 'admin@admin.com',
                'password'      => bcrypt(123),
                'start_year'	=> 2019,
                'gender'		=> $faker->randomElement(['L','P']),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => 2,
                'nip'           => $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
                'name'          => 'Tukiyem',
                'email'         => 'operator1@operator1.com',
                'password'      => bcrypt(123),
                'start_year'	=> 2019,
                'gender'		=> $faker->randomElement(['L','P']),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => 3,
                'nip'           => $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
                'name'          => 'Sukirman',
                'email'         => 'operator2@operator2.com',
                'password'      => bcrypt(123),
                'start_year'	=> 2019,
                'gender'		=> $faker->randomElement(['L','P']),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'role_id'       => 4,
                'nip'           => $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
                'name'          => 'Gitung',
                'email'         => 'sugitung@guru.com',
                'password'      => bcrypt(123),
                'start_year'	=> 2019,
                'gender'		=> $faker->randomElement(['L','P']),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
