<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;


class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Video::truncate();
        $filename = database_path('videos.csv');
        $fh = fopen($filename,"r");
        $first = true;
        while($row = fgetcsv($fh)){

            if ($first){
                $first = false;
                continue;
            }
            $v = new Video;

            $v->name = $row[1];
            $v->url = "https://".$row[2];
            $v->notes = $row[3];
            $v->sort_order = $row[4];
            $v->category = $row[7];
            $v->save();
        }
        fclose($fh);
    }
}
