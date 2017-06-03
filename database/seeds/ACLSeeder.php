<?php

use Illuminate\Database\Seeder;

class ACLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('ressources')->truncate();
        DB::table('groupes')->truncate();
        DB::table('group_user')->truncate();
        DB::table('group_resource')->truncate();

        DB::table('sponsors')->truncate();
        DB::table('categorieSponsors')->truncate();
        DB::table('categorieSponsor_sponsor')->truncate();

        DB::table('editions')->truncate();
        DB::table('prixs')->truncate();
        DB::table('articlePresses')->truncate();
        DB::table('medias')->truncate();
        DB::table('actualites')->truncate();
        DB::table('membres')->truncate();

        DB::table('categorieSponsor_edition')->truncate();
        DB::table('edition_prix')->truncate();
        DB::table('articlePresse_edition')->truncate();
        DB::table('edition_media')->truncate();
        DB::table('actualite_edition')->truncate();
        DB::table('edition_membre')->truncate();



        //*******CREATION DES USERS*******
        $user1 = new App\User();
        $user1->email = 'john@example.com';
        $user1->password = bcrypt('123456');
        $user1->name = 'John Smith';
        $user1->save();
        $user2 = new App\User();
        $user2->email = 'david@example.com';
        $user2->password = bcrypt('123456');
        $user1->name = 'David Neely';
        $user2->save();
        $user3 = new App\User();
        $user3->email = 'peter@example.com';
        $user3->password = bcrypt('123456');
        $user3->name = 'Peter Braxton';
        $user3->save();

        //*******CREATION DES GROUPES*******
        $admin = new \App\Groupe();
        $admin->nom = 'admin';
        $admin->description ="Groupe d'administrateur, ayant tous les droits sur toutes les ressources - Create, Read, Update, Delete";
        $admin->save();
        $contributor = new \App\Groupe();
        $contributor->nom = 'contributor';
        $contributor->description = "Groupe de contributeurs, ayant tous les droits sur toutes les ressources sauf Edition";
        $contributor->save();



        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*********************************************************************************
        //*******************A PARTIR DE LA C'EST PAS ENCORE FAIT**************************


        /*$album1 = new App\Album();
        $album1->titre = 'album1';
        $album1->description = "description de l'album 1";
        $album1->user_id = 1;
        $album1->save();*/

        //OU MIEUX

        $album1 = $user1->albums()->save(new \App\Album([
            'titre' => 'Album 1',
            'description' => 'Description de l album 1'
        ]));

        $album2 = $user1->albums()->save(new \App\Album([
            'titre' => 'Album 2',
            'description' => 'Description de l album 2'
        ]));

        /*$album2 = new App\Album();
        $album2->titre = 'album2';
        $album2->description = "description de l'album 2";
        $album2->user_id = 1;
        $album2->save();*/

        $album3 = $user2->albums()->save(new \App\Album([
            'titre' => 'Album 3',
            'description' => 'Description de l album 3'
        ]));

        /*$album3 = new App\Album();
        $album3->titre = 'album3';
        $album3->description = "description de l'album 3";
        $album3->user_id = 2;
        $album3->save();*/

        $photo1 = new \App\Photo();
        $photo1->nom = 'photo 1';
        $photo1->description = 'description de la photo 1';
        $photo1->save();

        $photo2 = new \App\Photo();
        $photo2->nom = 'photo 2';
        $photo2->description = 'description de la photo 2';
        $photo2->save();

        $photo3 = new \App\Photo();
        $photo3->nom = 'photo 3';
        $photo3->description = 'description de la photo 3';
        $photo3->save();

        $photo4 = new \App\Photo();
        $photo4->nom = 'photo 4';
        $photo4->description = 'description de la photo 4';
        $photo4->save();

        $photo5 = new \App\Photo();
        $photo5->nom = 'photo 5';
        $photo5->description = 'description de la photo 5';
        $photo5->save();

        $photo6 = new \App\Photo();
        $photo6->nom = 'photo 6';
        $photo6->description = 'description de la photo 6';
        $photo6->save();

        $photo7 = new \App\Photo();
        $photo7->nom = 'photo 7';
        $photo7->description = 'description de la photo 7';
        $photo7->save();

        $album1->photos()->save($photo1);
        $album1->photos()->save($photo2);
        $album1->photos()->save($photo3);

        $album2->photos()->save($photo1);

        $album3->photos()->save($photo4);
        $album3->photos()->save($photo5);
        $album3->photos()->save($photo6);
        $album3->photos()->save($photo7);

        /*** RELATIONSHIPS ***/
        /*** GROUPS ***/
        $admin = new \App\Group();
        $admin->name = 'admin';
        $admin->save();
        /*$moderator = new \App\Group();
        $moderator->name = 'moderator';
        $moderator->save();*/
        $basique = new \App\Group();
        $basique->name = 'visitor';
        $basique->save();
        /*** RESSOURCES ***/
        $album = new \App\Resource();
        $album->name = "album";
        $album->save();
        $photo = new \App\Resource();
        $photo->name = "photo";
        $photo->save();
        // ADD USERS TO GROUPS
        $admin->users()->save($user1);
        $basique->users()->save($user2);
        // GIVE ROLES TO GROUPS ON RESSOURCES
        $admin->resources()->save($album, ['role' => \App\Role::DELETE]);
        $admin->resources()->save($album, ['role' => \App\Role::UPDATE]);
        $admin->resources()->save($album, ['role' => \App\Role::READ]);
        $admin->resources()->save($album, ['role' => \App\Role::CREATE]);

        $basique->resources()->save($album, ['role' => \App\Role::READ]);
        $basique->resources()->save($album, ['role' => \App\Role::CREATE]);
    }
}
