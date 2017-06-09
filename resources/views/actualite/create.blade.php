@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du actualite</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Erreur dans les valeurs entrées</div>
                    @endif
                    <form action="{{ action('Back_office\ActualiteCtrl@store') }}" id="actualite-form" method="POST" novalidate="novalidate" target="_parent">
                        <label for="titre">Titre</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="titre" required="" aria-required="true" aria-invalid="true" placeholder="Titre de l'actualite">
                            </div>
                        </div>
                        <label for="datePublication">Date de publication</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="date" class="form-control" name="datePublication" required="" aria-required="true" aria-invalid="true" placeholder="Date de publication">
                            </div>
                        </div>
                        <label for="contenu">Contenu de l'article</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="contenu" required="" aria-required="true" aria-invalid="true" placeholder="Contenu de l'article">
                            </div>
                        </div>
                        <label for="auteur">Auteur</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="auteur" required="" aria-required="true" aria-invalid="true" placeholder="Auteur de l'article">
                            </div>
                        </div>
                        <label for="publie">Publication</label>
                        <div class="demo-radio-button ">
                            <input class="radio-col-light-blue" name="publie" type="radio" id="true" value="1"checked />
                            <label for="true">Oui</label>
                            <input class="radio-col-light-blue" name="publie" type="radio" value="0" id="false" />
                            <label for="false">Non</label>
                        </div>
                        <label for="urlImage">Url de l'image </label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="url" class="form-control" name="urlImage" required="" aria-required="true" aria-invalid="true" placeholder="Url de l'image">
                            </div>
                            <div class="help-info">Commence par http:// ou https://</div>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
