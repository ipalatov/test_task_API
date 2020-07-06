<?php

use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cars')->insert([
            'brand' => 'VAZ',
            'model' => '2101',
            'color' => 'красный',
            'state_number' => 'о123оо34',
            'client_id' => 1,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'brand' => 'VAZ',
            'model' => '2102',
            'color' => 'синий',
            'state_number' => 'о577ор34',
            'client_id' => 2,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'brand' => 'VAZ',
            'model' => '2103',
            'color' => 'красный',
            'state_number' => 'о767ор34',
            'client_id' => 3,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'brand' => 'LADA',
            'model' => 'Vesta',
            'color' => 'синий',
            'state_number' => 'о666оо34',
            'client_id' => 4,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'brand' => 'LADA',
            'model' => 'Vesta',
            'color' => 'черный',
            'state_number' => 'о345оо34',
            'client_id' => 5,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'brand' => 'LADA',
            'model' => 'X-Ray',
            'color' => 'красный',
            'state_number' => 'о543о34',
            'client_id' => 6,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cars')->insert([
            'brand' => 'Hyundai',
            'model' => 'Sonata',
            'color' => 'серый',
            'state_number' => 'е777уу777',
            'client_id' => 6,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
