@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Ajout d'une association {{$type_ressource}} pour l'édition {{$annee}}</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Le nom est déjà pris</div>
                    @endif
                    <form action="{{ action('Back_office\EditionAssociationCtrl@store') }}" id="media-form" method="POST"
                          novalidate="novalidate" target="_parent">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <p>
                                    <b>Associations possibles</b>
                                </p>
                                <select class="form-control show-tick" data-live-search="true" name="ressource_id">
                                    @foreach($objets as $objet)
                                        @if(!$edition->objetsDeLedition->contains($objet))
                                        <option value="{{$objet->id}}" type="number">{{$objet->titre}}</option>
                                        @endif
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="edition_id" value="{{$edition->id}}">
                        <input type="hidden" name="type_ressource" value="{{$type_ressource}}">
                        <input type="submit" class="btn btn-primary waves-effect" value="Ajouter cette association"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection