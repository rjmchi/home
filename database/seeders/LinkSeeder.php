<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filename = database_path('links.csv');
        $fh = fopen($filename,"r");
        $first = true;
        while($row = fgetcsv($fh)){

            if ($first){
                $first = false;
                continue;
            }
            $v = new Link;

            $v->name = $row[1];
            $v->url = 'https://'.$row[2];
            if ($row[3]){
                $v->image = 'images/'.$row[3];
            }
            $v->sort_order = $row[6];
            $v->save();
        }
        fclose($fh);
    }
}
