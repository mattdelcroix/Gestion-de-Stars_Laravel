<?php

use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stars')->insert([
            'nom' => 'Stallone',
            'prenom' => 'Sylverster',
            'description' => 'Michael Sylvester Gardenzio Stallone, dit Sylvester Stallone [sɪlˈvɛstɚ stəˈloʊn]1, né le 6 juillet 1946 à New York, dans le quartier de Hell\'s Kitchen, dans l\'État de New York, aux (États-Unis), est un acteur, réalisateur, scénariste et producteur de cinéma américain.',
            'photo' => 'photoStars/stallone.jpg',
        ]);

        DB::table('stars')->insert([
            'nom' => 'Tesla',
            'prenom' => 'Nicolas',
            'description' => 'Nikola Tesla, né dans la nuit du 9 au 10 juillet 1856 à Smiljan dans l\'Empire d\'Autriche et mort le 7 janvier 1943 à New York, est un inventeur et ingénieur américain d\'origine serbe.',
            'photo' => 'photoStars/tesla.jpg',
        ]);

        DB::table('stars')->insert([
            'nom' => 'Gandhi',
            'prenom' => 'Mohandas Karamchand',
            'description' => 'Mohandas Karamchand Gandhi, né à Porbandar le 2 octobre 1869 et mort assassiné à Delhi le 30 janvier 1948, est un dirigeant politique, important guide spirituel de l\'Inde et du mouvement pour l\'indépendance de ce pays.',
            'photo' => 'photoStars/gandhi.jpg',
        ]);

        DB::table('stars')->insert([
            'nom' => 'Churchill',
            'prenom' => 'winston',
            'description' => 'Sir Winston Churchill [ˈwɪnstin ˈtʃɜːtʃɪl], né le 30 novembre 1874 à Woodstock et mort le 24 janvier 1965 à Londres, est un homme d\'État britannique.',
            'photo' => 'photoStars/churchill.jpg',
        ]);
        
    }
}
