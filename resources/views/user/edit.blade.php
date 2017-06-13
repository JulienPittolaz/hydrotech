@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Modification du user</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Erreur dans les valeurs entrées</div>
                    @endif
                    <form action="{{ action('Back_office\UserCtrl@update', $id = $user->id) }}" id="user-form"
                          method="POST" novalidate="novalidate" target="_parent">

                        <label for="name">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$user->name}}" type="text" class="form-control" name="name" required="" aria-required="true" aria-invalid="true" placeholder="Name du user">
                            </div>
                        </div>
                        <label for="email">Adresse mail de l'user</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$user->email}}" type="email" class="form-control" name="email" required="" aria-required="true" aria-invalid="true" placeholder="Adresse mail du user">
                            </div>
                        </div>
                        <label for="password">Mot de passe du user</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="password" class="form-control" name="password" required="" aria-required="true" aria-invalid="true" placeholder="Password du user">
                            </div>
                        </div>
                        <label for="password2">Nouveau mot de passe du user</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="password" class="form-control" name="password2" aria-required="true" aria-invalid="true" placeholder="Password du user">
                            </div>
                            <div class="help-info">Ne remplir que si vous désirez changer de mot de passe</div>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                </div>
            </div>
        </div>
    </div>
@endsection