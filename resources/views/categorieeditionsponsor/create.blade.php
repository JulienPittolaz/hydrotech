@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Ajout d'une association entre une catégorie et un sponsor pour l'édition {{$annee}}</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Le nom est déjà pris</div>
                    @endif
                    <form action="{{ action('Back_office\CategorieEditionSponsorCtrl@store') }}" id="media-form" method="POST"
                          novalidate="novalidate" target="_parent">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <p>
                                    <b>Catégories</b>
                                </p>
                                <select class="form-control show-tick" data-live-search="true" name="categorie_id">
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}" type="number">{{$categorie->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <p>
                                    <b>Sponsors</b>
                                </p>
                                <select class="form-control show-tick" data-live-search="true" name="sponsor_id">
                                    @foreach($sponsors as $sponsor)
                                        <option value="{{$sponsor->id}}" type="number">{{$sponsor->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="edition_id" value="{{$edition->id}}">
                        <input type="submit" class="btn btn-primary waves-effect" value="Ajouter cette association"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection