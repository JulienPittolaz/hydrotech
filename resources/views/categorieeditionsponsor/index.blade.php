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
                                @foreach($edition->categorie as $categorie)
                                    <li>{{$categorie->nom}}</li>
                                <ul>
                                    @foreach($categorie->categorieeditionsponsors as $assoc)
                                        <ul>
                                        <li>{{$assoc->sponsor->nom}}</li>
                                        </ul>
                                        @endforeach
                                </ul>
                                @endforeach
                            </ul>

                            <a href="{{action('Back_office\CategorieEditionSponsorCtrl@create',$edition->annee)}}" target="_parent"><button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button></a>

                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection