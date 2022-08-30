<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\Bootcamp;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         $json=File::get('database/_data/bootcamps.json');
       
         $arreglo_bootcamp=json_decode($json);
      
        foreach($arreglo_bootcamp as $bootcamp){
    
        Bootcamp::create([
        "name" => $bootcamp -> name,
        "description" => $bootcamp -> description,
        "website" => $bootcamp -> website,
        "phone" => $bootcamp -> phone,
        "user_id" => $bootcamp -> user_id
         ]);
    }

}
}