@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des associations entre éditions et {{$typeRessource}}s
                    </h2>
                </div>
                <div class="body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <ul>
                    @foreach($editions as $edition)
                            <li>{{$edition->annee}}</li>
                            <ul>

                                @foreach($edition->objetsDeLedition as $objet)
                                    @if($objet->pivot->actif == true)
                                        <li>{{$objet->titre}}{{$objet->nom}}{{$objet->titreArticle}}
                                            <form class="bouton_delete" method="post"
                                                  action="{{action('Back_office\EditionAssociationCtrl@destroy', ['edition_id' => $edition->id, 'type_ressource' => $typeRessource, 'resource_id' => $objet->id])}}"
                                                  accept-charset="UTF-8">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn bg-red">X
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        <a href="{{action('Back_office\EditionAssociationCtrl@create', [$edition->annee, $typeRessource])}}"
                           target="_parent">
                            <button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button>
                        </a>

                        @endforeach
                    </ul>


                </div>
            </div>
        </div>
    </div>
@endsection