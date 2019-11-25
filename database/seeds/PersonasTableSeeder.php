<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = [
            'Adrian Grunberg',
            'Sylvester Stallone',
            'Paz Vega',
            'Sergio Peris-Mencheta',
            'Jon Favreau',
            'Donald Glover',
            'Beyoncé',
            'Seth Rogen',
            'Todd Phillips',
            'Joaquin Phoenix',
            'Robert De Niro',
            'Zazie Beetz',
            'Christopher Nolan',
            'Matthew McConaughey',
            'Anne Hathaway',
            'Jessica Chastain',
            'Mackenzie Foy',
            'Ang Lee',
            'Will Smith',
            'Mary Elizabeth Winstead',
            'Clive Owen'
        ];
        
        foreach( $person as $persona ){
            DB::table("personas")->insert([
                'nombre' => $persona
            ]);
        }
    }
}
