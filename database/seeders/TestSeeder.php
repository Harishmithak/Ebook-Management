<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $report = fopen(public_path("data/category.csv"),"r");
 $datarow = true;
 while (($data = fgetcsv($report, 4000, ",")) !== FALSE){
if(!$datarow){
 category::create([
   "category_name" => $data[0],
 "category_image" => $data[1],

 ]);
}
$datarow=false;
 } 
   fclose($report);
    }
}
