<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filename = database_path('notes.csv');
        $fh = fopen($filename,"r");
        $first = true;
        while($row = fgetcsv($fh)){

            if ($first){
                $first = false;
                continue;
            }
            $v = new Note;

            $v->title = $row[1];
            $v->note = $row[3];
            $v->save();
        }
        fclose($fh);
    }
}
