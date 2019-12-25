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
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);

        for ($i=1; $i < 21; $i++) {
    		$bata[$i]	= [
                'role_id'       => 4,
                'nip'           => $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
                'name'          => $faker->name,
                'email'         => $faker->email,
                'password'      => bcrypt(123),
                'start_year'	=> 2019,
                'gender'		=> $faker->randomElement(['L','P']),
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
    		];
    	}
        DB::table('users')->insert($bata);

        $lata     = [
            [
                'user_id'       => 4,
                'name'          => 'X-IPA-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 5,
                'name'          => 'X-IPA-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 6,
                'name'          => 'X-IPS-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 7,
                'name'          => 'X-IPS-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 8,
                'name'          => 'XI-IPA-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 9,
                'name'          => 'XI-IPA-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 10,
                'name'          => 'XI-IPS-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 11,
                'name'          => 'XI-IPS-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 12,
                'name'          => 'XII-IPA-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 13,
                'name'          => 'XII-IPA-2',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 14,
                'name'          => 'XII-IPS-1',
                'max_student'   => 2,
            ],
            [
                'user_id'       => 15,
                'name'          => 'XII-IPS-2',
                'max_student'   => 2,
            ],
        ];
        DB::table('classrooms')->truncate();
        DB::table('classrooms')->insert($lata);

        $cls     = App\Model\Classroom::pluck('name');
        $ls     = App\Model\ListCourse::pluck('name');
        for ($i=4; $i < 21; $i++) {
            $cata[$i]	= [
                'user_id'           => $i,
                'school_year_id'    => 1,
                'classroom'         => $faker->randomElement($cls),
                'list_course'       => $faker->randomElement($ls),
                'assistant'         => null,
                'status'            => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
    		];
    	}
        DB::table('courses')->truncate();
        DB::table('courses')->insert($cata);
    }
}
