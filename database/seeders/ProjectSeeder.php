<?php

namespace Database\Seeders;

use app\Models\Project;
use app\Functions\Helpers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //percorso per prendere il file csv
        $csvData = Helpers::getCsv(__DIR__ . "/projects-list.csv");

        foreach($csvData as $indice => $riga){
            if($indice ==! 0){ //diferente de 0 poi ali contèm o nome das propriedades da tabela!
                $newProject = new Project();
                $newProject->title = $riga[0];
                $newProject->description = $riga[1];
                $newProject->category = $riga[2];
                $newProject->tech_stack = $riga[3];
                $newProject->github_link = $riga[4];
                $newProject->creation_date = $riga[5];
                $newProject->tech_stack = $riga[6];
                $newProject->save();
            }
        }
    }
}