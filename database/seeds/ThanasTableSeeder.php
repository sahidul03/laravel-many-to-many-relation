<?php

use Illuminate\Database\Seeder;
use App\Models\Thana;

class ThanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $multiple_rows = array(
    		[ 'id' => 1, 'name' => 'Mirpur', 'district_id' => 1],
    		[ 'id' => 2, 'name' => 'Gulshan', 'district_id' => 1],
    		[ 'id' => 3, 'name' => 'Madaripur sadar', 'district_id' => 2],
    		[ 'id' => 4, 'name' => 'Kalkini', 'district_id' => 2],
    		[ 'id' => 5, 'name' => 'Shibchar', 'district_id' => 2],
    		[ 'id' => 6, 'name' => 'Tuira', 'district_id' => 3],
    		[ 'id' => 7, 'name' => 'Toppila', 'district_id' => 3],
    		[ 'id' => 8, 'name' => 'Kallio', 'district_id' => 4],
    		[ 'id' => 9, 'name' => 'Kamppi', 'district_id' => 4],
    	);
    	foreach($multiple_rows as $single_row){
    		// DB::table('thanas')->insert($single_row);
            Thana::create($single_row);
		}
    }
}
