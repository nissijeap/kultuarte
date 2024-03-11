<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ethnic_Groups;

class EthnicGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ethnic_groups = Ethnic_Groups::create([
            'ethnic_name' => 'Maranao' 
        ]);

        $ethnic_groups = Ethnic_Groups::create([
            'ethnic_name' => 'Tausug' 
        ]);

        $ethnic_groups = Ethnic_Groups::create([
            'ethnic_name' => 'Higaonon' 
        ]);

        $ethnic_groups = Ethnic_Groups::create([
            'ethnic_name' => 'Migrants' 
        ]);
    }
}