@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du user</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Erreur dans les valeurs entrées</div>
                    @endif
                    <form action="{{ action('Back_office\UserCtrl@store') }}" id="user-form" method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="name">Name</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="name" required="" aria-required="true" aria-invalid="true" placeholder="Name du user">
                            </div>
                        </div>
                        <label for="email">Adresse mail de l'user</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="email" class="form-control" name="email" required="" aria-required="true" aria-invalid="true" placeholder="Adresse mail du user">
                            </div>
                        </div>
                        <label for="password">Password de l'user</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="password" class="form-control" name="password" required="" aria-required="true" aria-invalid="true" placeholder="Password du user">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
