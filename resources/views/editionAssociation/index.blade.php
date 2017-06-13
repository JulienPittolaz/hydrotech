@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des associations entre éditions  et {{$typeRessource}}s
                    </h2>
                </div>
                <div class="body">

                    @foreach($editions as $edition)
                        <ul>
                            <li>{{$edition->annee}}</li>
                            @foreach($edition->objetsDeLedition as $objet)
                                <ul><li>{{$objet->titre}}{{$objet->nom}}</li></ul>

                                <form method="post" action="{{action('Back_office\EditionAssociationCtrl@destroy', ['edition_id' => $edition->id, 'type_ressource' => $typeRessource, 'resource_id' => $objet->id])}}" accept-charset="UTF-8">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn bg-red waves-effect">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            @endforeach
                        </ul>
                        <a href="{{action('Back_office\EditionAssociationCtrl@create', [$edition->annee, $typeRessource])}}" target="_parent"><button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button></a>

                        {{--
                                                <a href="{{action('Back_office\EditionAssociationCtrl@create')}}" target="_parent"><button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button></a>
                        --}}
{{--
                        <a href="{{action('Back_office\EditionAssociationCtrl@create'), ['type_ressource' => 'media', 'annee' => 2017]}}" target="_parent"><button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button></a>
--}}

                    @endforeach




                </div>
            </div>
        </div>
    </div>
@endsection