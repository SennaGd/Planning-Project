<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            'uid' => 'uid1',
            'dt_stamp' => now(),
            'dt_strat' => now(),
            'dt_end' => now()->addHour(),
            'summary' => 'Activity 1',
            'description' => 'Description for Activity 1',
            'location' => 'Location for Activity 1',
            'status' => 'active',
            'text' => 'some text',
            'version' => '1.0',
            'attendee' => 'user@example.com',
        ]);

        Activity::create([
            'uid' => 'uid2',
            'dt_stamp' => now()->addHours(1),
            'dt_strat' => now()->addHours(2),
            'dt_end' => now()->addHours(3),
            'summary' => 'Activity 2',
            'description' => 'Description for Activity 2',
            'location' => 'Location for Activity 2',
            'status' => 'active',
            'text' => 'some text',
            'version' => '1.0',
            'attendee' => 'user@example.com',
        ]);
    }
}
