<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
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
                'teacher_id'    => 1,
                'name'          => 'X-IPA-1',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 2,
                'name'          => 'X-IPA-2',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 3,
                'name'          => 'X-IPS-1',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 4,
                'name'          => 'X-IPS-2',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 5,
                'name'          => 'XI-IPA-1',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 6,
                'name'          => 'XI-IPA-2',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 7,
                'name'          => 'XI-IPS-1',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 8,
                'name'          => 'XI-IPS-2',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 9,
                'name'          => 'XII-IPA-1',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 10,
                'name'          => 'XII-IPA-2',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 11,
                'name'          => 'XII-IPS-1',
                'max_student'   => 2,
            ],
            [
                'teacher_id'    => 12,
                'name'          => 'XII-IPS-2',
                'max_student'   => 2,
            ],
        ];
        DB::table('classrooms')->truncate();
        DB::table('classrooms')->insert($data);
    }
}
