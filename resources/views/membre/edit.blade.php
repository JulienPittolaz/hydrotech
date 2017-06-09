@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Modification du membre</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Erreur dans les valeurs entrées</div>
                    @endif
                    <form action="{{ action('Back_office\MembreCtrl@update', $id = $membre->id) }}" id="membre-form" method="POST" novalidate="novalidate" target="_parent">
                        <label for="prenom">Prenom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$membre->prenom}}" type="text" class="form-control" name="prenom" required="" aria-required="true" aria-invalid="true" placeholder="Prenom du membre">
                            </div>
                        </div>
                        <label for="nom">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$membre->nom}}" type="text" class="form-control" name="nom" required="" aria-required="true" aria-invalid="true" placeholder="Nom du membre">
                            </div>
                        </div>
                        <label for="dateNaissance">Date de naissance</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$membre->dateNaissance}}" type="date" class="form-control" name="dateNaissance" required="" aria-required="true" aria-invalid="true" >
                            </div>
                        </div>
                        <label for="adresseMail">Adresse mail</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$membre->adresseMail}}" type="email" class="form-control" name="adresseMail" required="" aria-required="true" aria-invalid="true" placeholder="Adresse mail du membre">
                            </div>
                        </div>
                        <label for="section">Section</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$membre->section}}" type="text" class="form-control" name="section" required="" aria-required="true" aria-invalid="true" placeholder="Section du membre">
                            </div>
                        </div>
                        <label for="description">Description</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$membre->description}}" type="text" class="form-control" name="description" required="" aria-required="true" aria-invalid="true" placeholder="Description du membre">
                            </div>
                        </div>
                        <label for="photoProfil">Photo de profil</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$membre->photoProfil}}" type="text" class="form-control" name="photoProfil" required="" aria-required="true" aria-invalid="true" placeholder="Photo de profil du membre">
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
