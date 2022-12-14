<?php

namespace Database\Seeders;

use Ulid\Ulid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedData = [
            [
                "name" => "Children",
                "age" => "7 to 15",
                "borrowing-point" => 0
            ],
            [
                "name" => "Children Exclusive",
                "age" => "7 to 15",
                "borrowing-point" => 10
            ],
            [
                "name" => "Youth",
                "age" => "15 to 24",
                "borrowing-point" => 0
            ],
            [
                "name" => "Youth Exclusive",
                "age" => "15 to 24",
                "borrowing-point" => 15
            ],
            [
                "name" => "Adult",
                "age" => "25 to 49",
                "borrowing-point" => 0
            ],
            [
                "name" => "Adult Exclusive",
                "age" => "25 to 49",
                "borrowing-point" => 20
            ],
            [
                "name" => "Senior",
                "age" => "50 and above",
                "borrowing-point" => 0
            ],
            [
                "name" => "Senior Exclusive",
                "age" => "50 and above",
                "borrowing-point" => 10
            ],
        ];

        foreach ($seedData as $seed) {
            DB::table('accesslevels')->insert([
                'id' => Ulid::generate(),
                'name' => $seed["name"],
                'age' => $seed["age"],
                'borrowing_point' => $seed["borrowing-point"],
                'created_at' => now(),
            ]);
        }
    }
}
