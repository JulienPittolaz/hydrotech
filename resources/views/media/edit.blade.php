@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edition du média</h2>
                </div>
                <div class="body">
                    <form action="{{ action('Back_office\MediaCtrl@update', $id = $media->id) }}" method="POST" novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="titre">Titre</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$media->titre}}" type="text" class="form-control" name="titre" required="" aria-required="true" aria-invalid="true">
                            </div>
                        </div>
                        <label for="date">Date</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$media->date}}" type="text" class="form-control" name="date" required="" aria-required="true" aria-invalid="true">
                            </div>
                        </div>
                        <label for="auteur">Auteur</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$media->auteur}}" type="text" class="form-control" name="auteur" required="" aria-required="true" aria-invalid="true">
                            </div>
                        </div>
                        <label for="typeMedia">Type de média</label>
                        <div class="demo-radio-button">
                            @if($media->typeMedia  == "Photo")
                                <input name="typeMedia" type="radio" id="Photo" value="Photo "checked />
                                <label for="Photo">Photo</label>
                                <input name="typeMedia" type="radio" value="Video" id="Video" />
                                <label for="Video">Video</label>
                            @else
                                <input name="typeMedia" type="radio" id="Photo" value="Photo " />
                                <label for="Photo">Photo</label>
                                <input name="typeMedia" type="radio" value="Video" id="Video" checked />
                                <label for="Video">Video</label>
                            @endif

                        </div>
                        <div class="mediaUpload">
                            <label for="url">url</label>
                            <label for="url">Icône du fichier (JPG ou MP4) :</label><br />
                            <input type="file" name="url" id="urlphoto" /><br />
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection