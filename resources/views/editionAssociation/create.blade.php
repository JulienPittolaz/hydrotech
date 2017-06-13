@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Ajout d'une association {{$type_ressource}} pour l'édition {{$annee}}</h2>
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
                                        <option value="{{$objet->id}}" type="number">{{$objet->titre}}{{$objet->nom}}</option>
                                        @endif
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        @if($type_ressource === 'membre')
                            <label for="role">Role</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input value="" type="text" class="form-control" name="role" required="" aria-required="true" aria-invalid="true" placeholder="Role">
                                </div>
                            </div>
                        @endif


                        <input type="hidden" name="edition_id" value="{{$edition->id}}">
                        <input type="hidden" name="type_ressource" value="{{$type_ressource}}">
                        <input type="submit" class="btn btn-primary waves-effect" value="Ajouter cette association"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection