@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du user</h2>
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
                    <form action="{{ action('Back_office\UserCtrl@store') }}" id="user-form" method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="name">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name" required="" aria-required="true" aria-invalid="true" placeholder="Nom">
                            </div>
                        </div>
                        <label for="email">Adresse mail</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{ old('email') }}" type="email" class="form-control" name="email" required="" aria-required="true" aria-invalid="true" placeholder="Adresse mail">
                            </div>
                        </div>
                        <label for="password">Mot de passe</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{ old('password') }}" type="password" class="form-control" name="password" required="" aria-required="true" aria-invalid="true" placeholder="Mot de passe">
                            </div>
                        </div>
                        <label for="password2">Confirmation du mot de passe</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{ old('password2') }}" type="password" class="form-control" name="password2" required="" aria-required="true" aria-invalid="true" placeholder="Confirmation du mot de passe">
                            </div>
                        </div>
                        <label for="groupe">Groupe</label>
                        <div class="form-group form-float">
                            <select class="form-control show-tick" data-live-search="true" name="groupe">
                                @foreach($groupes as $groupe)
                                    <option value="{{$groupe->id}}" type="number">{{$groupe->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
