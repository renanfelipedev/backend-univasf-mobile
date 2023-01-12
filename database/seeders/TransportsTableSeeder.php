<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $juazeiro = \App\Models\Campus::where('name', 'Campus Juazeiro')->first();

        $rota = $juazeiro->transports()->create([
            'title' => '1º Horário - Motorista 1',
            'busname' => 'Ônibus A',
            'description' => 'Via Batalhão da PM/Avenida das Nações',
            'origin' => 'UNIVASF Campus Juazeiro/BA',
            'destination' => 'UNIVASF Campus Ciências Agrárias – CCA',
        ]);

        $rota->stops()->createMany([
            ['time' => '06:10', 'title' => 'UNIVASF Campus Juazeiro/BA'],
            ['time' => '06:12', 'title' => 'Sanfra Motos'],
            ['time' => '06:15', 'title' => 'AABB'],
            ['time' => '06:20', 'title' => 'Estação Velha / Cooperativa Brasil'],
            ['time' => '06:23', 'title' => 'Farmácia Popular (João XIII)'],
            ['time' => '06:25', 'title' => 'Verdão'],
            ['time' => '06:27', 'title' => 'Ao lado do Batalhão da PM/BA'],
            ['time' => '06:30', 'title' => 'Posto Raul Lins (Castelo Lins)'],
            ['time' => '06:32', 'title' => 'Equipadora Coordeniro (Alto do Cruzeiro)'],
            ['time' => '06:35', 'title' => 'Parque da Lagoa de Calú'],
            ['time' => '06:37', 'title' => 'Canteiro de Obras –Juazeiro'],
            ['time' => '06:40', 'title' => 'Terminal de Juazeiro - Camelódromo 02 de Julho'],
            ['time' => '07:05', 'title' => 'UNIVASF Campus Ciências Agrárias - CCA'],
        ]);
    }
}
