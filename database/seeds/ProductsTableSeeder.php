<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        /**
         * Books
         */
        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/1/0/1/1001004010971015.jpg',
            'title' => 'Harry Potter',
            'description' => 'Was erg leuk om te lezen, vroeger.',
            'price' => 10
        ]);


        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/2/0/0/2/1001004005932002.jpg',
            'title' => 'Name of the wind',
            'description' => 'Super cool, geweldig verhaal',
            'price' => 12
        ]);


        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/extralarge/FC/6/4/4/7/9200000002597446.jpg',
            'title' => 'Game of Thrones',
            'description' => 'Iets te langdradig voor mijn smaak',
            'price' => 10
        ]);


        Product::create([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/81XSN3hA5gL.jpg',
            'title' => 'Hitchhikers guide to the galaxy',
            'description' => 'Ik snap de humor niet...',
            'price' => 8
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/4/0/4/8/9200000024098404.jpg',
            'title' => 'Dalai Lama',
            'description' => 'Een must-read!',
            'price' => 17
        ]);

        /**
         * Movies
         */
        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/3/2/7/3/9200000125593723.jpg',
            'title' => 'Game of Thrones - Seizoen 8 (Limited Edition)',
            'description' => 'Inclusief limited edition luxe verpakking',
            'price' => 35
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/6/7/7/4/9200000080514776.jpg',
            'title' => 'Penoza - Seizoen 1 t/m 5',
            'description' => 'Alle vijf seizoenen van Penoza',
            'price' => 20
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/1/2/0/1/9200000118461021.jpg',
            'title' => 'Shetland - Seizoen 4',
            'description' => 'LET OP!: In vergelijking met Engeland hebben de seizoenen in Nederland een andere volgorde. De telling bij de Pilot: Pilot = Serie 1 Serie 1 = Serie 2 Serie 2 = Serie 3 Serie 3 = Serie 4',
            'price' => 20
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/6/8/7/8/9200000115168786.jpg',
            'title' => 'Game of Thrones - The Complete Collection: Seizoen 1 t/m 8',
            'description' => 'De volledige tv-serie met alle acht seizoenen',
            'price' => 138
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/1/8/3/2/9200000116002381.jpg',
            'title' => 'The Office (US) Complete Series (\'19)',
            'description' => 'Het lachen gaat door met elke aflevering van de bekroonde serie in deze complete serie box.',
            'price' => 62
        ]);

        /**
         * Music
         */
        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/9/8/0/9200000108180895.jpg',
            'title' => 'Pressure Makes Diamonds 1 & 2',
            'description' => 'The Year Of The Snake & Pompadour Hippie',
            'price' => 17
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/7/2/0/2/9200000129752027.jpg',
            'title' => 'Future Nostalgia (Coloured Vinyl)',
            'description' => 'Het nieuwe album van Dua Lipa op roze vinyl',
            'price' => 27
        ]);

        Product::create([
            'imagePath' => 'https://media.s-bol.com/Y6gBPyBoDyAY/550x550.jpg',
            'title' => '538 Hitzone 92',
            'description' => 'De eerste Hitzone van 2020',
            'price' => 17
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/5/4/2/9200000128092455.jpg',
            'title' => 'Blauwe Vear',
            'description' => 'Het aller eerste solo album van Jack Poels',
            'price' => 18
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/3/2/8/9200000130068235.jpg',
            'title' => 'Human :II: Nature',
            'description' => 'Human :II: Nature is het nieuwe album van Nightwish',
            'price' => 18
        ]);

        /**
         * Videogames
         */
        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/1/3/9/8/9200000129618931.jpg',
            'title' => 'Animal Crossing: New Horizons - Nintendo Switch Download',
            'description' => 'Met het super exclusieve Eilandleven-pakket van Nook Inc. reis je naar een onbewoond eiland om daar te genieten van een zorgeloos leventje vol creativiteit en volledige vrijheid om te gaan en staan waar je wilt.',
            'price' => 57
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/2/2/4/9200000073684225.jpg',
            'title' => 'Mario Kart 8 Deluxe - Nintendo Switch',
            'description' => 'In Mario Kart 8 Deluxe voor de Nintendo Switch racen populaire personages uit de vorige Mario series tegen elkaar op circuits van het Paddenstoelenrijk met speciale voorwerpen.',
            'price' => 57
        ]);

        Product::create([
            'imagePath' => 'https://media.s-bol.com/YEYMRkv335GO/550x709.jpg',
            'title' => 'F1 2019 (Formule 1) - PS4',
            'description' => 'F1®2019, het officiële spel van het 2019 Fia Formula One World, daagt je uit om je rivalen te verslaan in de meest ambitieuze F1® game in de geschiedenis van Codemasters. ',
            'price' => 35
        ]);

        Product::create([
            'imagePath' => 'https://media.s-bol.com/g0JEqB78N7r/550x685.jpg',
            'title' => 'GTA V - (Grand Theft Auto 5) - Premium Edition - PS4',
            'description' => 'De Grand Theft Auto V: Premium Edition bevat de complete verhaalervaring van Grand Theft Auto V, gratis toegang tot het uitgebreide Grand Theft Auto Online en alle bestaande gameplay-upgrades en content',
            'price' => 30
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/0/7/4/9200000113944705.jpg',
            'title' => 'FIFA 20 - PS4',
            'description' => 'EA SPORTS FIFA 20, aangedreven door Frostbite, brengt de twee aspecten van \'The World\'s Game\' tot leven: het prestige van het als prof spelen en de totaal nieuwe straatvoetbalervaring in EA SPORTS VOLTA. FIFA 20 vernieuwt het hele spel.',
            'price' => 40
        ]);

        /**
         * Musical instruments
         */
        Product::create([
            'imagePath' => 'https://media.s-bol.com/qYjp71kV1ppR/550x255.jpg',
            'title' => 'Áengus keyboard 54 toetsen met microfoon A-542',
            'description' => 'Op zoek naar een betaalbaar keyboard voor uw kind met wat extra mogelijkheden? Dit Áengus keyboard met 54 toetsen heeft 16 verschillende klankkleuren én 10 verschillende ritmes.',
            'price' => 46
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/0/5/3/9/9200000023429350.jpg',
            'title' => 'Klassieke gitaar snaren Set .028 - verzilverd - A106-H',
            'description' => 'Setje snaren voor de klassieke gitaar. Snaren in deze set .0285, .0325, .041, .030, .036, .044. ',
            'price' => 6
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/0/5/7/2/9200000102182750.jpg',
            'title' => 'Dunlop plectrum Standard Nylon SET 0.38mm-1.00mm 6-pack',
            'description' => 'Plectra om gitaar mee te spelen',
            'price' => 6
        ]);

        Product::create([
            'imagePath' => 'https://media.s-bol.com/jqkqZA8Ljq05/550x313.jpg',
            'title' => 'Keyboard - MAX KB1 keyboard met 61 toetsen en trainingsfunctie',
            'description' => 'Wordt een echte toetsenist met het MAX KB1 Keyboard met 61 toetsen en 3-staps trainingsfunctie. Een geweldig keyboard om de beginselen van het keyboard spelen mee onder de knie te krijgen.',
            'price' => 84
        ]);

        Product::create([
            'imagePath' => 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/2/4/3/2/9200000021792342.jpg',
            'title' => 'Guitar Capo - Gitaar Capodaster - zwart',
            'description' => 'Deze stevige aluminium capo met handig knijpmechanisme is geschikt voor klassieke/spaanse gitaren, akoestische/western gitaren en elektrische gitaren.',
            'price' => 12
        ]);


    }
}
