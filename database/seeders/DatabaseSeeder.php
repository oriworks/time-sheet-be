<?php

namespace Database\Seeders;

use App\Models\Shift;
use App\Models\User;
use App\Models\Workday;
use App\Models\Workplace;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $square = Workplace::create(['name' => 'Praça']);
        $beach = Workplace::create(['name' => 'Praia']);
        $oasis = Workplace::create(['name' => 'Oásis']);

        $user = User::create([
            'name' => 'Joel Oliveira',
            'email' => 'joeloliveira@oriworks.com',
            'password' => Hash::make('qwerty123'),
            'workplace_id' => $square->id,
        ]);

        $s = new Shift([
            'started_at' => Carbon::create(2021, 4, 26, 9),
            'ended_at' => Carbon::create(2021, 4, 26, 17),
            'workplace_id' => $square->id,
        ]);
        Workday::create([
            'user_id' => $user->id,
            'day' => Carbon::create(2021, 4, 26),
            'day_off' => false
        ])->shifts()->save($s);
        $s = new Shift([
            'started_at' => Carbon::create(2021, 4, 27, 12),
            'ended_at' => Carbon::create(2021, 4, 27, 16),
            'workplace_id' => $square->id,
        ]);
        $s1 = new Shift([
            'started_at' => Carbon::create(2021, 4, 27, 19),
            'ended_at' => Carbon::create(2021, 4, 27, 23),
            'workplace_id' => $oasis->id,
        ]);
        Workday::create([
            'user_id' => $user->id,
            'day' => Carbon::create(2021, 4, 27),
            'day_off' => false
        ])->shifts()->saveMany([$s, $s1]);
    }
}
