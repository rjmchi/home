<?php

namespace Database\Seeders;

use App\Models\Reminder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$filename = database_path('reminders.csv');
        $fh = fopen($filename,"r");
        $first = true;
        while($row = fgetcsv($fh)){

            if ($first){
                $first = false;
                continue;
            }
            $v = new Reminder;

            $v->message = $row[1];
            if ($row[2]){
                $v->due_date = $row[2];
            }
            if ($row[3]){
                $v->days = $row[3];
            }
            $v->save();
        }
        fclose($fh);
    }
}
