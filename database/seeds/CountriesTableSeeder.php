<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$multiple_rows = array(
    		[ 'id' => 1, 'name' => 'Bangladesh'],
    		[ 'id' => 2, 'name' => 'Finland']
    	);
    	foreach($multiple_rows as $single_row){
    		// DB::table('countries')->insert($single_row);
            Country::create($single_row);
		}
    }
}
