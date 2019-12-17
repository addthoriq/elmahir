<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\ListCourse;
use App\Model\Classroom;
use Faker\Factory;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker 		= Factory::create('id_ID');
    	for ($i=1; $i < 21; $i++) {
    		$data[$i]	= [
                'nip'			=> $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
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
        DB::table('teachers')->truncate();
        DB::table('teachers')->insert($data);
    }
}
