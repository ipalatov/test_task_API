<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clients')->insert([
            'FIO' => 'Иванов Иван Иванович',
            'gender' => 'm',
            'phone' => '123123',
            'address' => 'Volgograd',

            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('clients')->insert([
            'FIO' => 'Петров Петр Петрович',
            'gender' => 'm',
            'phone' => '+7(123)123-123',
            'address' => 'Volzhsky',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('clients')->insert([
            'FIO' => 'Сидорова Анна Сидоровна',
            'gender' => 'f',
            'phone' => '+1(123)123- 123',
            'address' => 'Sr.Akhtuba',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('clients')->insert([
            'FIO' => 'Антипов Иван Иванович',
            'gender' => 'm',
            'phone' => '+7123123123',
            'address' => 'Volgograd',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('clients')->insert([
            'FIO' => 'Скляр Петр Петрович',
            'gender' => 'm',
            'phone' => '+7(423)423-423',
            'address' => 'Volzhsky',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('clients')->insert([
            'FIO' => 'Тучина Анна Ивановна',
            'gender' => 'f',
            'phone' => '+1(823)423- 123',
            'address' => 'Sr.Akhtuba',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
