@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du média</h2>
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
                    <form action="{{ action('Back_office\MediaCtrl@store') }}" id="media-form" method="POST"
                          novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="titre">Titre</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="titre" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Titre">
                            </div>
                        </div>
                        <label for="date">Date</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="date" class="form-control" name="date" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Date">
                            </div>
                        </div>
                        <label for="auteur">Auteur</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="auteur" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Auteur">
                            </div>
                        </div>
                        <label for="typeMedia">Type de média</label>
                        <div class="demo-radio-button">
                            <input name="typeMedia" type="radio" id="Photo" value="Photo " checked/>
                            <label for="Photo">Photo</label>
                            <input name="typeMedia" type="radio" value="Video" id="Video"/>
                            <label for="Video">Video</label>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <div class="mediaUpload">
                                    <label for="url">Icône du fichier (JPG ou MP4) :</label><br/>
                                    <input type="file" name="url" id="urlphoto"/><br/>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary waves-effect"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection