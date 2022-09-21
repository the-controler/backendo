<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //to use the database
use Illuminate\Support\Facades\Hash; //if you want to use the hashage
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert(
        //     [
        //      'first_name'=>'peter',
        //      'last_name'=>'parker',
        //      'card_id_or_passeport'=>'k1215242',
        //      'phone'=>'0606060606',
        //      'driving_license'=>'258741',
        //      'age'=>'25',
        //      'username'=>'peter_parker',
        //      'password'=>Hash::make('12345')
        //  ]
		//  [
        //      'first_name'=>'med',
        //      'last_name'=>'said',
        //      'card_id_or_passeport'=>'k5712468',
        //      'phone'=>'0707070707',
        //      'driving_license'=>'8469124',
        //      'age'=>'29',
        //      'username'=>'med_said',
        //      'password'=>Hash::make('12345')
        //  ],
        [
              'username'=>'admin2',
              'password'=>Hash::make('12345'),
          'role'=>'AdminAuto']
		 );
        // DB::table('cars')->insert(
        //  [
        //      'name'=>'DACIA LOGAN',
        //      'image'=>'https://cdn.group.renault.com/dac/ma/plan/obi-models-assets/lji-logan/logan-lji-ph1/hero-zones/dacia-logan-lji-ph1-hero-zone-001.jpg.ximg.mediumx2.webp/7291d566b4.webp',
        //      'description'=>'LA BERLINE GÉNÉREUSE & FAMILIALE
        //      Avec sa silhouette élégante et sa face avant redessinée, mise en valeur par une nouvelle signature de marque en forme de Y à LED, Nouvelle Logan dévoile son design totalement renouvelé. À l’intérieur, grâce à ses équipements pratiques associés à l’une des meilleures habitabilités de sa catégorie, offrez à toute la famille un voyage dans les meilleures conditions',
        //      'status'=>'Available',
        //      'price'=>'500.00',
        //      'guarantee'=>'20000.00'
        //  ]
        //      [
        //          'name'=>'DACIA SANDERO',
        //          'image'=>'https://cdn.group.renault.com/dac/ma/plan/dacia-sandero-bji-ph1-hero-zone-002.jpg.ximg.mediumx2.webp/1a5a737a41.webp',
        //          'description'=>'LA CITADINE AGILE & ROBUSTE
        //          Avec sa silhouette robuste et sa face avant repensée, 
        //          soulignée par sa nouvelle signature de marque en forme de Y à feux LED,
        //           Nouvelle Sandero Streetway dévoile son design totalement renouvelé.
        //            À l’intérieur, grâce à l’une des meilleures habitabilités de sa catégorie, son coffre et ses rangements généreux, elle s’adapte à votre quotidien pour rendre votre voyage encore plus agréable.',
        //          'status'=>'Available',
        //          'price'=>'550.00',
        //          'guarantee'=>'20000.00'
        //      ]
        // );
    }
}
