@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du réseau social</h2>
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
                    <form action="{{ action('Back_office\SocialCtrl@store') }}" id="social-form" method="POST" novalidate="novalidate" target="_parent">
                        <label for="nom">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="nom" required="" aria-required="true" aria-invalid="true" placeholder="Nom du réseau social">
                            </div>
                        </div>
                        <label for="urlLogo">Adresse URL</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="url" class="form-control" name="url" required="" aria-required="true" aria-invalid="true" placeholder="Url">
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
