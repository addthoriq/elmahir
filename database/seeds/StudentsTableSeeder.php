<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Model\Classroom;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker 		= Factory::create('id_ID');
    	for ($i=0; $i < 41; $i++) {
            $data[$i]	= [
                'classroom_id'  => $faker->randomDigitNot(0),
                'nisn'			=> $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
    			'name'			=> $faker->name,
    			'email'			=> $faker->email,
    			'password'		=> bcrypt(123),
    			'start_year'	=> 2019,
    			'gender'		=> $faker->randomElement(['L','P']),
    			'status'		=> 1,
    			'created_at'	=> now(),
    			'updated_at'	=> now(),
    		];
    	}
        DB::table('students')->truncate();
        DB::table('students')->insert($data);

        for ($i=1; $i < 41 ; $i++) {
            $bata[$i]	= [
                'student_id'  => $i,
                'school_year_id' => 1,
                'classroom_id'  => $faker->randomDigitNot(0),
                'status' => 1,
            ];
    	}
        DB::table('class_histories')->truncate();
        DB::table('class_histories')->insert($bata);
    }
}
