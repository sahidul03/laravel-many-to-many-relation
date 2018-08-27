<?php

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $multiple_rows = array(
    		[ 'id' => 1, 'name' => 'Dhaka', 'country_id' => 1 ],
    		[ 'id' => 2, 'name' => 'Madaripur', 'country_id' => 1],
    		[ 'id' => 3, 'name' => 'Oulu', 'country_id' => 2],
    		[ 'id' => 4, 'name' => 'Helsinki', 'country_id' => 2],
    	);
    	foreach($multiple_rows as $single_row){
    		// DB::table('districts')->insert($single_row);
            District::create($single_row);
		}
    }
}
