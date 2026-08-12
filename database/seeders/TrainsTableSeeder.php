<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Train; // import model
use Faker\Generator as Faker; // import Faker

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 30; $i++) {
        //  create a train blueprint from class Model
        $newTrain = new Train();

        // here the logic blocks for manipulating variables before assignation
        $departureStation = $faker->cityPrefix() . ' ' . $faker->city();

        do {
            $arrivalStation = $faker->cityPrefix() . ' ' . $faker->city();
        } while ($arrivalStation === $departureStation);

        $depTime = $faker->dateTimeBetween('05:00:00','21:00:00');
        $arrTime = (clone $depTime)->modify('+'. rand(15, 180) . 'minutes');
        $nextPlannedDate = $faker->dateTimeBetween('now', '+ 3 days')->format('Y-m-d');

        // let's generate a random status
        $trainStatus = 'scheduled';
        $trainDelayMinutes = 0;

        if ( Carbon::parse($nextPlannedDate)->isToday()) {
            $chance = rand(1, 100);

            if ( $chance <= 10 ) {
                $trainStatus = 'cancelled';
                $trainDelayMinutes = 0; // we can omit as is default 0
            } elseif ( $chance <= 20 ) {
                $trainStatus = 'delayed';
                $trainDelayMinutes = $faker->numberBetween(5, 90);
            }
            elseif ( $chance <= 5) {
                $trainStatus = 'early';
                $trainDelayMinutes = $faker->numberBetween(-6, -1);
            } else {
                $trainStatus = 'on_time';
                $trainDelayMinutes =  0;  // we can omit as is default 0
            }
        } else {
            $newTrain->status = 'scheduled';
        }
        // SE IL TRENO È OGGI
        // 10% cancelled
        // 20% ritardo
        // 5% ANTICIPO
        // 65% ON_TIME
        // altrimenti SCHEDULED


        // let's fill it up withfakers 
        // N.B: id is generatedd by DB with auto increment:
        // no need to handle it in seeders!!
        $newTrain->company = 'Fourth Wall Breaker';
        $newTrain->departure_station = $departureStation;
        $newTrain->arrival_station = $arrivalStation;
        $newTrain->departure_time = $depTime->format('H:i:s');
        $newTrain->arrival_time = $arrTime->format('H:i:s');
        $newTrain->arrival_time = $faker->time();
        $newTrain->train_code = 'FWB-' . $faker->randomNumber(3, true);
        $newTrain->next_planned = $nextPlannedDate;
        $newTrain->status = $trainStatus;
        $newTrain->delay_minutes = $trainDelayMinutes;

        $newTrain->save();


        }
    }
}
