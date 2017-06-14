@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du edition</h2>
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
                    <form action="{{ action('Back_office\EditionCtrl@store')}}" id="edition-form" method="POST"
                          novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="annee">Annee</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="number" class="form-control" name="annee" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Annee de l'édition">
                            </div>
                        </div>
                        <label for="nomEquipe">Nom de l'équipe</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="nomEquipe" required=""
                                       aria-required="true" aria-invalid="true"
                                       placeholder="Nom de l'équipe pour l'édition">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="urlLogo">Image de l'édition</label>
                            <div id="image-cropper-edition-background">
                                <div class="cropit-preview"></div>
                                <input type="range" class="cropit-image-zoom-input" />
                                <!-- The actual file input will be hidden -->
                                <input type="file" class="cropit-image-input" />
                                <!-- And clicking on this button will open up select file dialog -->
                            </div>
                            <input id="urlImageMedia" type="hidden" name="urlImageMedia">
                        </div>
                        <label for="lieu">Lieu</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="lieu" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Lieu de l'édition">
                            </div>
                        </div>
                        <label for="dateDebut">Date du début de l'édition</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="date" class="form-control" name="dateDebut" required=""
                                       aria-required="true" aria-invalid="true"
                                       placeholder="Date du début de l'édition">
                            </div>
                        </div>
                        <label for="dateFin">Date de fin de l'édition</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="date" class="form-control" name="dateFin" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Date de Fin de l'édition">
                            </div>
                        </div>
                        <label for="description">Description</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="description" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Description de l'édition">
                            </div>
                        </div>
                        <label for="publie">Publication</label>
                        <div class="demo-radio-button ">
                            <input class="radio-col-light-blue" name="publie" type="radio" id="true" value="1" checked/>
                            <label for="true">Oui</label>
                            <input class="radio-col-light-blue" name="publie" type="radio" value="0" id="false"/>
                            <label for="false">Non</label>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"/>
                    </form>
                    {{--<form action="{{ action('Back_office\EditionCtrl@store')}}" id="edition-form" method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">--}}
                    {{--<input type="file" id="file1"/>--}}
                    {{--<input type="file" id="file2" />--}}
                    {{--<input type="submit" class="btn btn-primary waves-effect"/>--}}
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
