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
            'title'=> 'Sünoptik: on lootust, et jõululaupäeva hommikul on maa valge',
            'description'=> 'Kauaoodatud jõulud endaga metsikuid lumehangesid kaasa ei too. Parimal juhul võib valget maad täheldada pühapäeva hommikul, teatas riikliku ilmateenistuse sünoptik Helve Meitern',
            'pubDate'=>new DateTime('now'),
            'link'=>'http://naistekas.delfi.ee/puhad/uudised/sunoptik-on-lootust-et-joululaupaeva-hommikul-on-maa-valge?id=80520190',
            'id_category'=>1
            ]);
    }
}
