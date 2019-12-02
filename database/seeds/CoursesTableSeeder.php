<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CoursesTableSeeder extends Seeder
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
                'teacher_id'    => 1,
                'classroom_id'		=> 1,
                'name'          => 'Bahasa Indonesia',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 2,
                'classroom_id'		=> 2,
                'name'          => 'Matematika',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 3,
                'classroom_id'		=> 3,
                'name'          => 'PPKn',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 4,
                'classroom_id'		=> 4,
                'name'          => 'Bahasa Inggris',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 5,
                'classroom_id'		=> 5,
                'name'          => 'IPS',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 6,
                'classroom_id'		=> 6,
                'name'          => 'IPA',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 7,
                'classroom_id'		=> 7,
                'name'          => 'Penjas',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 8,
                'classroom_id'		=> 8,
                'name'          => 'Seni Budaya',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 9,
                'classroom_id'		=> 9,
                'name'          => 'Kewirausahaan',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 10,
                'classroom_id'		=> 10,
                'name'          => 'Agama',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 11,
                'classroom_id'		=> 11,
                'name'          => 'TIK',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
            [
                'teacher_id'    => 12,
                'classroom_id'		=> 12,
                'name'          => 'Bahasa Jawa',
                'assistant'		=> $faker->name,
                'semester'		=> '1',
            ],
        ];
        DB::table('courses')->truncate();
        DB::table('courses')->insert($data);
    }
}
