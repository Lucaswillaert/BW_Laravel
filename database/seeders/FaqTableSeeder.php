<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            ['word mijn date beschermd? ', 'Jouw data is alleen zichtbaar voor jezelf, zelfs administrators kunnen er niet aan.'],
            ['kan ik mijn quotes delen op social media?', 'Nee, maar dit zou in de toekomst er wel eens bij kunnen komen!'],
            ['kan ik een overzicht zien van al mijn quotes dat ik gemaakt heb?', 'Nee, maar dit zou in de toekomst er wel eens bij kunnen komen!'],
            ['Wat is het doel van deze journaling website?', 'Het doel van deze website is om gebruikers een platform te bieden waar ze hun gedachten, ervaringen en inspirerende quotes kunnen vastleggen en delen. Het is een plek om te reflecteren, motivatie te vinden en een positieve gemeenschap op te bouwen.'],
            ['jn er beperkingen aan het aantal journals en quotes dat ik kan toevoegen?','Nee, je kan oneindig journallen!'],
            ['Hoe kan ik mijn account verwijderen?','Om je account te verwijderen, ga je naar de accountinstellingen en volg je de instructies voor het verwijderen van je account. Let op: het verwijderen van je account kan niet ongedaan worden gemaakt, en al je gegevens worden permanent verwijderd.'],
            // Voeg hier meer vragen en antwoorden toe...
        ];

        foreach ($faqs as $faq) {
            DB::table('faqs')->insert([
                'question' => $faq[0],
                'answer' => $faq[1],
                'date' => Carbon::now(),
                'published' => true,
                'user_id' => 1, // Zorg ervoor dat deze gebruiker bestaat in je users tabel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
