@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des associations de sponsors par catégorie et par année
                    </h2>
                </div>
                <div class="body">
                    <ul>
                        @foreach($editions as $edition)

                            <li>{{$edition->annee}}</li>
                            <ul>
                                @foreach($edition->sponsorsParCategorie as $sponsorsParCategorie)
                                    <li>{{$sponsorsParCategorie->nom}}</li>
                                    <ul>
                                        @foreach($sponsorsParCategorie as $categorie)
                                            @foreach($categorie->sponsorsDeCetteCategorie as $sponsor)
                                                {{$sponsor}}
                                            @endforeach
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>

                            {{--
                                                    <a href="{{action('Back_office\EditionAssociationCtrl@create', [$edition->annee, $typeRessource])}}"
                            target="_parent">
                            --}}
                            <button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button>
                            </a>

                            {{--
                                                    <a href="{{action('Back_office\EditionAssociationCtrl@create')}}" target="_parent"><button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button></a>
                            --}}
                            {{--
                                                    <a href="{{action('Back_office\EditionAssociationCtrl@create'), ['type_ressource' => 'media', 'annee' => 2017]}}" target="_parent"><button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button></a>
                            --}}

                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection