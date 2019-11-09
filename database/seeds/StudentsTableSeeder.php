<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
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
                'classroom_id'    => 1,
                'nisn'            => '999921321434',
                'name'            => 'Sukijan',
                'email'           => 'sukijan@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'L',
                'status'          => 1
            ],
            [
                'classroom_id'    => 1,
                'nisn'            => '999922211',
                'name'            => 'Sumadi',
                'email'           => 'sumadi@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'L',
                'status'          => 1
            ],
            [
                'classroom_id'    => 1,
                'nisn'            => '99993123244',
                'name'            => 'Purnomo',
                'email'           => 'purnomo@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'L',
                'status'          => 1
            ],
            [
                'classroom_id'    => 1,
                'nisn'            => '99992166432',
                'name'            => 'Bambank',
                'email'           => 'bambank@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'L',
                'status'          => 1
            ],
            [
                'classroom_id'    => 2,
                'nisn'            => '99923411234',
                'name'            => 'Zaenab',
                'email'           => 'zaenab.a@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'P',
                'status'          => 1
            ],
            [
                'classroom_id'    => 2,
                'nisn'            => '999966773213',
                'name'            => 'Zulaikha',
                'email'           => 'zulaikha.s@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'P',
                'status'          => 1
            ],
            [
                'classroom_id'    => 2,
                'nisn'            => '99996757655',
                'name'            => 'Suminah',
                'email'           => 'suminah.s@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'P',
                'status'          => 1
            ],
            [
                'classroom_id'    => 2,
                'nisn'            => '99992154354635',
                'name'            => 'Sarinah Aulia',
                'email'           => 'sarinah.aulia@siswa.com',
                'password'        => bcrypt(123),
                'start_year'      => '2019',
                'gender'          => 'P',
                'status'          => 1
            ],
        ];
        DB::table('students')->truncate();
        DB::table('students')->insert($data);
        $bata     = [
            [
                'student_id'        => 1,
                'school_year_id'    => 1,
                'classroom_id'      => 1,
                'status'            => 1,
            ],
            [
                'student_id'        => 2,
                'school_year_id'    => 1,
                'classroom_id'      => 1,
                'status'            => 1,
            ],
            [
                'student_id'        => 3,
                'school_year_id'    => 1,
                'classroom_id'      => 1,
                'status'            => 1,
            ],
            [
                'student_id'        => 4,
                'school_year_id'    => 1,
                'classroom_id'      => 1,
                'status'            => 1,
            ],
            [
                'student_id'        => 5,
                'school_year_id'    => 1,
                'classroom_id'      => 2,
                'status'            => 1,
            ],
            [
                'student_id'        => 6,
                'school_year_id'    => 1,
                'classroom_id'      => 2,
                'status'            => 1,
            ],
            [
                'student_id'        => 7,
                'school_year_id'    => 1,
                'classroom_id'      => 2,
                'status'            => 1,
            ],
            [
                'student_id'        => 8,
                'school_year_id'    => 1,
                'classroom_id'      => 2,
                'status'            => 1,
            ],
        ];
        DB::table('class_histories')->truncate();
        DB::table('class_histories')->insert($bata);
    }
}
