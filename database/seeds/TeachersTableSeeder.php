<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
    	for ($i=0; $i < 15; $i++) { 
    		
    		$data[$i]	= [
    			'name'			=> $faker->name,
    			'email'			=> $faker->email,
    			'password'		=> bcrypt(123),
    			'nip'			=> $faker->numberBetween($min = 190000000000000000, $max = 210000000000000000),
    			'start_year'	=> $faker->year($max = 'now'),
    			'gender'		=> 'L',
    			'status'		=> 1,
    			'created_at'	=> now(),
    			'updated_at'	=> now(),
    		];
    	}

        DB::table('teachers')->truncate();
        DB::table('teachers')->insert($data);
    }
}
