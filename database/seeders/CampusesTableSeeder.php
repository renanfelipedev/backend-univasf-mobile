<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusesTableSeeder extends Seeder
{
    public function run()
    {
        $pe = \App\Models\State::create(['name' => 'Pernambuco', 'uf' => 'PE']);
        $ba = \App\Models\State::create(['name' => 'Bahia', 'uf' => 'BA']);
        $pi = \App\Models\State::create(['name' => 'Piauí', 'uf' => 'PI']);

        $petrolina = $pe->cities()->create(['name' => 'Petrolina']);
        $salgueiro = $pe->cities()->create(['name' => 'Salgueiro']);

        $juazeiro = $ba->cities()->create(['name' => 'Juazeiro']);
        $paulo_afonso = $ba->cities()->create(['name' => 'Paulo Afonso']);

        $sao_raimundo = $pi->cities()->create(['name' => 'São Raimundo Nonato']);

        \App\Models\Campus::create([
            'name' => 'Campus Petrolina',
            'state_id' => $pe->id,
            'city_id' => $petrolina->id
        ]);

        \App\Models\Campus::create([
            'name' => 'Campus Salgueiro',
            'state_id' => $pe->id,
            'city_id' => $salgueiro->id
        ]);

        \App\Models\Campus::create([
            'name' => 'Campus Juazeiro',
            'state_id' => $ba->id,
            'city_id' => $juazeiro->id
        ]);

        \App\Models\Campus::create([
            'name' => 'Campus Paulo Afonso',
            'state_id' => $ba->id,
            'city_id' => $paulo_afonso->id
        ]);

        \App\Models\Campus::create([
            'name' => 'Campus São Raimundo Nonato',
            'state_id' => $pi->id,
            'city_id' => $sao_raimundo->id
        ]);
    }
}
