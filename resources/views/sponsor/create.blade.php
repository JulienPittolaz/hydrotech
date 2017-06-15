@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du sponsor</h2>
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
                    <form action="{{ action('Back_office\SponsorCtrl@store') }}" id="sponsor-form" method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="nom">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="nom" required="" aria-required="true" aria-invalid="true" placeholder="Nom du sponsor">
                            </div>
                        </div>
                        <div class="form-group form-float">
                        <label for="urlLogo">Adresse URL du logo</label>
                        <div id="image-cropper-sponsor-logo">
                            <div class="cropit-preview"></div>
                            <input type="range" class="cropit-image-zoom-input" />
                            <!-- The actual file input will be hidden -->
                            <input type="file" class="cropit-image-input" />
                            <!-- And clicking on this button will open up select file dialog -->
                        </div>
                        <input id="urlLogo" type="hidden" name="urlLogo">
                        </div>
                        <div class="form-group form-float">
                            <label for="urlSponsor">Adresse du site du sponsor</label>
                            <div class="form-line">
                                <input value="" type="url" class="form-control" name="urlSponsor" required="" aria-required="true" aria-invalid="true" placeholder="Site du sponsor">
                            </div>
                            <div class="help-info">Commence par http:// ou https://</div>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
