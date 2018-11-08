<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $janine = \App\User::where('name', 'Janine')->first();
        $bob = \App\User::where('name', 'Bob')->first();

        $l1 = new \App\Location;
        $l1->user_id = $janine->id;
        $l1->name = 'Home';
        $l1->zipcode = '40502';
        $l1->save();

        $l2 = new \App\Location;
        $l2->user_id = $janine->id;
        $l2->name = 'Work';
        $l2->zipcode = '40507';
        $l2->save();

        $l3 = new \App\Location;
        $l3->user_id = $bob->id;
        $l3->name = 'Class';
        $l3->zipcode = '40507';
        $l3->save();

        $l4 = new \App\Location;
        $l4->user_id = $bob->id;
        $l4->name = 'Home';
        $l4->zipcode = '42731';
        $l4->save();

        $l5 = new \App\Location;
        $l5->user_id = $bob->id;
        $l5->name = 'Vacation (West)';
        $l5->zipcode = '90210';
        $l5->save();

        $l6 = new \App\Location;
        $l6->user_id = $bob->id;
        $l6->name = 'Vacation (South)';
        $l6->zipcode = '32901';
        $l6->save();
    }
}
