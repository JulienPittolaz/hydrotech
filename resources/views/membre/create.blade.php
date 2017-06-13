@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du membre</h2>
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
                    <form action="{{ action('Back_office\MembreCtrl@store') }}" id="membre-form" method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="prenom">Prenom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="prenom" required="" aria-required="true" aria-invalid="true" placeholder="Prenom du membre">
                            </div>
                        </div>
                        <label for="nom">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="nom" required="" aria-required="true" aria-invalid="true" placeholder="Nom du membre">
                            </div>
                        </div>
                        <label for="dateNaissance">Date de naissance</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="date" class="form-control" name="dateNaissance" required="" aria-required="true" aria-invalid="true" >
                            </div>
                        </div>
                        <label for="adresseMail">Adresse mail</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="email" class="form-control" name="adresseMail" required="" aria-required="true" aria-invalid="true" placeholder="Adresse mail du membre">
                            </div>
                        </div>
                        <label for="section">Section</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="section" required="" aria-required="true" aria-invalid="true" placeholder="Section du membre">
                            </div>
                        </div>
                        <label for="description">Description</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="description" required="" aria-required="true" aria-invalid="true" placeholder="Description du membre">
                            </div>
                        </div>
                        <label for="photoProfil">Photo de profil (JPG, PNG ou GIF) :</label><br />
                        <input type="file" name="photoProfil" id="photoProfil" /><br />
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
