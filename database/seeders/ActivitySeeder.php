<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\SchoolClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $schoolClasses = collect(['SD1A', 'SD1B', 'SD2A', 'SD2B'])
            ->mapWithKeys(fn (string $classname): array => [
                $classname => SchoolClass::firstOrCreate(['classname' => $classname]),
            ]);

        $activities = [
            [
                'uid' => 'uid1',
                'dt_start' => $now->copy()->subHours(6),
                'dt_end' => $now->copy()->subHours(5),
                'summary' => 'Introductie Software Development',
                'description' => 'Kennismaking met softwareontwikkeling, versiebeheer en samenwerken in teams.',
                'location' => 'Lokaal A101',
                'attendee' => 'development@example.com',
                'classes' => ['SD1A', 'SD1B'],
            ],
            [
                'uid' => 'uid2',
                'dt_start' => $now->copy()->subHours(4),
                'dt_end' => $now->copy()->subHours(3),
                'summary' => 'Workshop Git en GitHub',
                'description' => 'Praktische workshop over branches, pull requests en code reviews.',
                'location' => 'Lokaal B204',
                'attendee' => 'development@example.com',
                'classes' => ['SD1A', 'SD1B'],
            ],
            [
                'uid' => 'uid3',
                'dt_start' => $now->copy()->subHours(2),
                'dt_end' => $now->copy()->subHour(),
                'summary' => 'Les Databases en SQL',
                'description' => 'Relationele databases ontwerpen en queries schrijven met SQL.',
                'location' => 'Lokaal C302',
                'attendee' => 'database@example.com',
                'classes' => ['SD1A', 'SD2A'],
            ],
            [
                'uid' => 'uid4',
                'dt_start' => $now->copy()->subHour(),
                'dt_end' => $now->copy()->addHour(),
                'summary' => 'Workshop API-ontwikkeling',
                'description' => 'REST APIs bouwen, testen en documenteren voor webapplicaties.',
                'location' => 'Lokaal A102',
                'attendee' => 'development@example.com',
                'classes' => ['SD1B', 'SD2B'],
            ],
            [
                'uid' => 'uid5',
                'dt_start' => $now->copy()->addHour(),
                'dt_end' => $now->copy()->addHours(2),
                'summary' => 'Linux Systeembeheer',
                'description' => 'Beheer van Linux servers, gebruikersrechten en processen.',
                'location' => 'Serverruimte 1',
                'attendee' => 'beheer@example.com',
                'classes' => ['SD2A', 'SD2B'],
            ],
            [
                'uid' => 'uid6',
                'dt_start' => $now->copy()->addHours(3),
                'dt_end' => $now->copy()->addHours(5),
                'summary' => 'Cloud Infrastructuur',
                'description' => 'Introductie in cloudplatformen, virtuele machines en schaalbaarheid.',
                'location' => 'Lokaal B205',
                'attendee' => 'cloud@example.com',
                'classes' => ['SD2A', 'SD2B'],
            ],
            [
                'uid' => 'uid7',
                'dt_start' => $now->copy()->addHours(6),
                'dt_end' => $now->copy()->addHours(7),
                'summary' => 'Cybersecurity Awareness',
                'description' => 'Herkennen van veiligheidsrisicos, phishing en veilige wachtwoorden.',
                'location' => 'Lokaal C301',
                'attendee' => 'security@example.com',
                'classes' => ['SD1A', 'SD2A'],
            ],
            [
                'uid' => 'uid8',
                'dt_start' => $now->copy()->addHours(8),
                'dt_end' => $now->copy()->addHours(10),
                'summary' => 'DevOps en CI/CD',
                'description' => 'Software automatisch bouwen, testen en uitrollen met CI/CD pipelines.',
                'location' => 'Lokaal A103',
                'attendee' => 'devops@example.com',
                'classes' => ['SD2A', 'SD2B'],
            ],
            [
                'uid' => 'uid9',
                'dt_start' => $now->copy()->addHours(11),
                'dt_end' => $now->copy()->addHours(12),
                'summary' => 'Netwerkbeheer',
                'description' => 'Basisprincipes van TCP/IP, netwerkmonitoring en troubleshooting.',
                'location' => 'Netwerklab',
                'attendee' => 'netwerk@example.com',
                'classes' => ['SD1B', 'SD2B'],
            ],
            [
                'uid' => 'uid10',
                'dt_start' => $now->copy()->addHours(14),
                'dt_end' => $now->copy()->addHours(16),
                'summary' => 'Projectpresentaties IT',
                'description' => 'Presentatie van afgeronde projecten voor software en systeembeheer.',
                'location' => 'Auditorium',
                'attendee' => 'it-projecten@example.com',
                'classes' => ['SD1A', 'SD1B', 'SD2A', 'SD2B'],
            ],
        ];

        foreach ($activities as $activity) {
            $createdActivity = Activity::create([
                ...collect($activity)->except('classes')->all(),
                'dt_stamp' => $now,
                'status' => 'active',
                'text' => 'IT en Software Development',
                'version' => '1.0',
            ]);

            Schema::withoutForeignKeyConstraints(function () use ($activity, $createdActivity, $schoolClasses): void {
                $createdActivity->attachSchoolClasses(
                    collect($activity['classes'])->map(fn (string $classname): int => $schoolClasses[$classname]->id)
                );
            });
        }
    }
}
