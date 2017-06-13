@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edition de l'article de edition</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Erreur dans les valeurs entrées</div>
                    @endif
                    <form action="{{ action('Back_office\EditionCtrl@update', $id = $edition->id) }}" 
                          method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="annee">Annee</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$edition->annee}}" type="integer" class="form-control" name="annee" required="" aria-required="true" aria-invalid="true" placeholder="Annee de l'édition">
                            </div>
                        </div>
                        <label for="nomEquipe">Nom de l'équipe</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$edition->nomEquipe}}" type="text" class="form-control" name="nomEquipe" required="" aria-required="true" aria-invalid="true" placeholder="Nom de l'équipe pour l'édition">
                            </div>
                        </div>
                        <label for="urlImageMedia">Photo de l'édition (JPG, PNG ou GIF) :</label><br />
                        <img src="{{url('/') }}/storage/editions/urlImageMedia{{$edition->id}}.jpg" width="100px" height="100px"/><br />
                        <input type="file" name="urlImageMedia" id="urlImageMedia" size="100"/><br />

                        <label for="urlImageEquipe">Photo de l'équipe (JPG, PNG ou GIF) :</label><br />
                        <img src="{{url('/') }}/storage/editions/urlImageEquipe{{$edition->id}}.jpg" width="100px" height="100px"/><br />
                        <input type="file" name="urlImageEquipe" id="urlImageEquipe" size="100"/><br />

                        <label for="lieu">Lieu</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$edition->lieu}}" type="text" class="form-control" name="lieu" required="" aria-required="true" aria-invalid="true" placeholder="Lieu de l'édition">
                            </div>
                        </div>
                        <label for="dateDebut">Date du début de l'édition</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$edition->dateDebut}}" type="date" class="form-control" name="dateDebut" required="" aria-required="true" aria-invalid="true" placeholder="Date du début de l'édition">
                            </div>
                        </div>
                        <label for="dateFin">Date de fin de l'édition</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$edition->dateFin}}" type="date" class="form-control" name="dateFin" required="" aria-required="true" aria-invalid="true" placeholder="Date de Fin de l'édition">
                            </div>
                        </div>
                        <label for="description">Description</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$edition->description}}" type="text" class="form-control" name="description" required="" aria-required="true" aria-invalid="true" placeholder="Description de l'édition">
                            </div>
                        </div>
                        <label for="publie">Publication</label>
                        <div class="demo-radio-button ">
                            @if($edition->publie == 1)
                            <input class="radio-col-light-blue" name="publie" type="radio" id="true" value="1"checked />
                            <label for="true">Oui</label>
                            <input class="radio-col-light-blue" name="publie" type="radio" value="0" id="false" />
                            <label for="false">Non</label>
                            @else
                                <input class="radio-col-light-blue" name="publie" type="radio" id="true" value="1" />
                                <label for="true">Oui</label>
                                <input class="radio-col-light-blue" name="publie" type="radio" value="0" id="false" checked />
                                <label for="false">Non</label>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection