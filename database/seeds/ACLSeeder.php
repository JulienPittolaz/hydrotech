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


        /*******CREATION DES RESSOURCES*******/
        $sponsor = new \App\Ressource();
        $sponsor->nom = "sponsor";
        $sponsor->save();
        $categorieSponsor = new \App\Ressource();
        $categorieSponsor->nom = "categorieSponsor";
        $categorieSponsor->save();
        $prix = new \App\Ressource();
        $prix->nom = "prix";
        $prix->save();
        $articlePresse = new \App\Ressource();
        $articlePresse->nom = "articlePresse";
        $articlePresse->save();
        $edition = new \App\Ressource();
        $edition->nom = "edition";
        $edition->save();
        $media = new \App\Ressource();
        $media->nom = "media";
        $media->save();
        $actualite = new \App\Ressource();
        $actualite->nom = "actualite";
        $actualite->save();
        $membre = new \App\Ressource();
        $membre->nom = "membre";
        $membre->save();
        $reseauSocial = new \App\Ressource();
        $reseauSocial->nom = "reseauSocial";
        $reseauSocial->save();
        $user = new \App\Ressource();
        $user->nom = "user";
        $user->save();

        //*******CREATION DES SPONSORS*******
        $sponsor1 = new \App\Sponsor();
        $sponsor1->nom = "Ville d'Yverdon";
        $sponsor1->urlLogo = "http://www.nationalsportscamp.ch/images/yootheme/logo-ville-yverdon.jpg";
        $sponsor1->urlSponsor = "http://www.yverdon-les-bains.ch";
        $sponsor1->save();
        $sponsor2 = new \App\Sponsor();
        $sponsor2->nom = "Apple";
        $sponsor2->urlLogo = "https://www.apple.com/ac/structured-data/images/knowledge_graph_logo.png";
        $sponsor2->urlSponsor = "https://www.apple.com/chfr/";
        $sponsor2->save();
        $sponsor3 = new \App\Sponsor();
        $sponsor3->nom = "Coca-Cola";
        $sponsor3->urlLogo = "https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Coca-Cola_logo.svg/1200px-Coca-Cola_logo.svg.png";
        $sponsor3->urlSponsor = "www.coke.ch/fr/home/";
        $sponsor3->save();


        //*******CREATION DES CATEGORIE DE SPONSORS*******
        $categorie1 = new \App\CategorieSponsor();
        $categorie1->nom = "Platine";
        $categorie1->description = "Catégorie de sponsors réservée aux plus grands contributeurs (min 15'000chf)";
        $categorie1->save();
        $categorie2 = new \App\CategorieSponsor();
        $categorie2->nom = "Or";
        $categorie2->description = "Catégorie de sponsors réservée aux grands contributeurs (10'000-15'000chf)";
        $categorie2->save();
        $categorie3 = new \App\CategorieSponsor();
        $categorie3->nom = "Argent";
        $categorie3->description = "Catégorie de sponsors réservée aux contributeurs moyen (5'000-10'000chf)";
        $categorie3->save();


        //*******CREATION DES MEDIAS*******
        $media1 = new \App\Media();
        $media1->url = "https://www.youtube.com/watch?v=xold7iw04E4";
        $media1->titre = "Un album trop cool !";
        $media1->date = "2017-06-03";
        $media1->auteur = "Future Fuzz";
        $media1->typeMedia = "Video";
        $media1->save();
        $media2 = new \App\Media();
        $media2->url = "//c1.staticflickr.com/7/6092/6330704947_dd7e1b453c.jpg";
        $media2->titre = "Mrrrooouuuuhhhhh !";
        $media2->date = "2011-10-10";
        $media2->auteur = "Cuba Gallery";
        $media2->typeMedia = "Photo";
        $media2->save();
        $media3 = new \App\Media();
        $media3->url = "https://s-media-cache-ak0.pinimg.com/736x/6a/a4/13/6aa41332810cc5164395aa9d5705a38b.jpg";
        $media3->titre = "Titre de la photo";
        $media3->date = "2015-02-03";
        $media3->auteur = "Bilan";
        $media3->typeMedia = "Photo";
        $media3->save();

        //*******RESEAU SOCIAL*******
        $reseau1 = new \App\ReseauSocial();
        $reseau1->nom = "Facebook";
        $reseau1->url = "https://www.facebook.com/";
        $reseau1->save();
        $reseau2 = new \App\ReseauSocial();
        $reseau2->nom = "Twitter";
        $reseau2->url = "https://twitter.com/";
        $reseau2->save();
        $reseau3 = new \App\ReseauSocial();
        $reseau3->nom = "Instagram";
        $reseau3->url = "https://www.instagram.com/";
        $reseau3->save();


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














































































































































































































        //*******CREATION DES PRIXS*******
        $prix1 = new App\Prix();
        $prix1->nom = 'Prix de l\'innovation de la mort !';
        $prix1->description = 'Ce prix récompense...';
        $prix1->montant = 3000;
        $prix1->save();
        $prix2 = new App\Prix();
        $prix2->nom = 'Prix de la communication de la mort !';
        $prix2->description = 'Ce prix récompense...';
        $prix2->montant = 1500;
        $prix2->save();
        $prix3 = new App\Prix();
        $prix3->nom = 'Prix de la remontée méchanique !';
        $prix3->description = 'Ce prix récompense...';
        $prix3->montant = 2;
        $prix3->save();

        //*******CREATION DES ARTICLES DE PRESSE*******
        $presse1 = new App\ArticlePresse();
        $presse1->url = 'http://flashinformatique.epfl.ch/spip.php?article36';
        $presse1->titreArticle = "Mais c'est super !";
        $presse1->description = "C'est une super description !";
        $presse1->dateParution = '2002-09-17';
        $presse1->nomPresse = "EPFL";
        $presse1->save();
        $presse2 = new App\ArticlePresse();
        $presse2->url = 'https://www.lematin.ch/';
        $presse2->titreArticle = "LA DERNIÈRE PROMESSE D'ALVES AU FC BARCELONE";
        $presse2->description = "C'est une super description !";
        $presse2->dateParution = '2012-03-04';
        $presse2->nomPresse = "Le Matin";
        $presse2->save();
        $presse3 = new App\ArticlePresse();
        $presse3->url = 'https://www.lefigaro.fr/';
        $presse3->titreArticle = "Notre-Dame-des-Landes : trois médiateurs déjà contestés";
        $presse3->description = "C'est une super description !";
        $presse3->dateParution = '2017-06-11';
        $presse3->nomPresse = "Le Figaro";
        $presse3->save();

        //*******CREATION DES EDITIONS*******
        $edition1 = new App\Edition();
        $edition1->annee = 2017;
        $edition1->nomEquipe = "TEAM HEIG-VD TAMER";
        $edition1->urlImageMedia = "http://img.el-wlid.com/imgcache/122723.jpg";
        $edition1->urlImageEquipe = 'http://aboutcolonblank.com/wp-content/uploads/2012/07/nyan-cat.png';
        $edition1->lieu = "Saint-Tropez";
        $edition1->dateDebut = "2017-07-04";
        $edition1->dateFin = '2017-07-11';
        $edition1->description = "Une description qui sera surement enlevée bientôt";
        $edition1->save();
        $edition2 = new App\Edition();
        $edition2->annee = 2016;
        $edition2->nomEquipe = "TEAM HEIG-VD JEAN-JEAN";
        $edition2->urlImageMedia = "http://img.el-wlid.com/imgcache/122723.jpg";
        $edition2->urlImageEquipe = 'http://aboutcolonblank.com/wp-content/uploads/2012/07/nyan-cat.png';
        $edition2->lieu = "Lausanne";
        $edition2->dateDebut = "2016-07-04";
        $edition2->dateFin = '2016-07-11';
        $edition2->description = "Une description qui sera surement enlevée bientôt";
        $edition2->save();
        $edition3 = new App\Edition();
        $edition3->annee = 2015;
        $edition3->nomEquipe = "TEAM HEIG-VD ON ETAIT PAS ENCORE LA";
        $edition3->urlImageMedia = "http://img.el-wlid.com/imgcache/122723.jpg";
        $edition3->urlImageEquipe = 'http://aboutcolonblank.com/wp-content/uploads/2012/07/nyan-cat.png';
        $edition3->lieu = "Un lieu resté secret";
        $edition3->dateDebut = "2015-07-04";
        $edition3->dateFin = '2015-07-11';
        $edition3->description = "Une description qui sera surement enlevée bientôt";
        $edition3->save();

        //*******CREATION DES MEMBRES*******
        $membre1 = new App\Membre();
        $membre1->adresseMail = 'claude@pingouin.heig-vd.ch';
        $membre1->nom = "Philipona";
        $membre1->prenom = "Claude";
        $membre1->dateNaissance = '1970-01-02';
        $membre1->section = "Professeur";
        $membre1->description = "Du fait de la fragilité conjoncturelle, il est nécessaire d'inventorier systématiquement les problématiques opportunes, pour le futur.";
        $membre1->photoProfil = 'http://flashinformatique.epfl.ch/IMG/auton28.jpg?1349272172';
        $membre1->role = "CEO";
        $membre1->save();
        $membre2 = new App\Membre();
        $membre2->adresseMail = 'lea@soukouti.ch';
        $membre2->nom = "Soukouti";
        $membre2->prenom = "Léa";
        $membre2->dateNaissance = '1994-03-29';
        $membre2->section = "Ingénieur des médias";
        $membre2->description = "Dans le but de pallier à l'inertie de l'époque actuelle, il est nécessaire de fédérer la simultanéité des organisations matricielles déclinables, avec beaucoup de recul.";
        $membre2->photoProfil = 'http://www.cly.ch/cly_site_2016/wp-content/uploads/2017/03/hotel_02.jpg';
        $membre2->role = "MASTER OF JAVASCRIPT";
        $membre2->save();
        $membre3 = new App\Membre();
        $membre3->adresseMail = 'tima@dlp.ch';
        $membre3->nom = "Delapierre";
        $membre3->prenom = "Timothée";
        $membre3->dateNaissance = '1992-06-22';
        $membre3->section = "Ingénieur des médias";
        $membre3->description = "Tant que durera la politique de ces derniers temps, on se doit de gérer la somme des actions emblématiques, dans une perspective correcte.";
        $membre3->photoProfil = 'http://1.bp.blogspot.com/-N1pmBkeBId0/UrS71Gsx0uI/AAAAAAAAKbM/pRIguKho8H0/s1600/021+333+MAJORCe%CC%81linaAde%CC%81line.jpg';
        $membre3->role = "MASTER OF WAVES";
        $membre3->save();
        $membre4 = new App\Membre();
        $membre4->adresseMail = 'jose@phine.ch';
        $membre4->nom = "Joséphine";
        $membre4->prenom = "Chabin";
        $membre4->dateNaissance = '1993-02-16';
        $membre4->section = "Ingénieur des médias";
        $membre4->description = "Avec cette inflexion intrinsèque, il serait bon de revoir toutes les voies que nous connaissons, dans une perspective correcte.";
        $membre4->photoProfil = 'https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAh5AAAAJGM2ZmUzNTNlLThlNGYtNDk4OC05NzgxLTQ1ZjgxYzdiZTNmMg.jpg';
        $membre4->role = "MASTER OF COLOR PIXELS";
        $membre4->save();

    }
}
