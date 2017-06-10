@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du sponsor</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Erreur dans les valeurs entrées</div>
                    @endif
                    <form action="{{ action('Back_office\SponsorCtrl@store') }}" id="sponsor-form" method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="nom">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="nom" required="" aria-required="true" aria-invalid="true" placeholder="Nom du sponsor">
                            </div>
                        </div>
                        <label for="urlLogo">Adresse URL du logo</label>
                        {{--<div class="image-editor">
                            <input type="hidden" name="MAX_FILE_SIZE" value="250000"/>
                            <input type="file" class="cropit-image-input" name="urlLogo">
                            <div class="cropit-preview"></div>
                            <div class="image-size-label">Redimensionner l'image</div>
                            <input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01">
                            <input type="hidden" name="image-data" class="hidden-image-data"/>
                        </div>--}}
                        <label for="urlLogo">Icône du fichier (JPG, PNG ou GIF) :</label><br />
                        <input type="file" name="urlLogo" id="urlLogo" /><br />
                        <label for="urlSponsor">Adresse du site du sponsor</label>
                        <div class="form-group form-float">
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
