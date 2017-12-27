<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title'=> 'Estonian city to be named 2024 European Capital of Culture',
            'description'=> 'For the first time since 2011, one of the 2024 European Capitals of Culture will once again be located in Estonia, and the Ministry of Culture and the Association of Estonian Cities on Wednesday announced a competition to determine which town or city will claim the title',
            'pubDate'=>new DateTime('now'),
            'link'=>'https://news.err.ee/645659/estonian-city-to-be-named-2024-european-capital-of-culture',
            'id_category'=>1
            ]);
    }
}
