@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du actualite</h2>
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
                    <form action="{{ action('Back_office\ActualiteCtrl@store') }}" id="actualite-form" method="POST"
                          novalidate="novalidate" target="_parent" enctype="multipart/form-data">
                        <label for="titre">Titre</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="titre" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Titre de l'actualite">
                            </div>
                        </div>
                        <label for="datePublication">Date de publication</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="date" class="form-control" name="datePublication" required=""
                                       aria-required="true" aria-invalid="true" placeholder="Date de publication">
                            </div>
                        </div>
                        <label for="contenu">Contenu</label>
                        <div class="form-group">
                            <div class="form-line">
                                <grammarly-ghost spellcheck="false">
                                    <div data-reactroot="" data-id="10220f19-cf11-0450-10f9-fab7e936b21b"
                                         data-gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b" data-gramm="gramm"
                                         data-gramm_editor="true" class="gr_ver_2" contenteditable="true"
                                         style="position: absolute; color: transparent; overflow: hidden; white-space: pre-wrap; border-radius: 0px; box-sizing: border-box; height: 32px; width: 1280px; margin: 0px; padding: 6px 12px 6px 0px; z-index: 0; border-width: 0px; border-style: none; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(255, 255, 255); top: 0px; left: 0px;">
                                        <span style="display: inline-block; line-height: 20px; color: transparent; overflow: hidden; text-align: left; float: initial; clear: none; box-sizing: border-box; vertical-align: baseline; white-space: pre-wrap; width: 100%; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; font-family: Roboto, Arial, Tahoma, sans-serif; letter-spacing: normal; text-shadow: none; height: 32px;"></span><br>
                                    </div>
                                </grammarly-ghost>
                                <textarea rows="1" class="form-control no-resize auto-growth" name="contenu"
                                          placeholder="Contenu de l'article"
                                          style="overflow: hidden; word-wrap: break-word; height: 32px; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none; background: transparent !important;"
                                          data-gramm="true" data-txt_gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b"
                                          data-gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b" spellcheck="false"
                                          data-gramm_editor="true"></textarea>
                                <grammarly-btn>
                                    <div data-reactroot=""
                                         class="_e725ae-textarea_btn _e725ae-show _e725ae-anonymous _e725ae-field_hovered"
                                         style="z-index: 2; transform: translate(1250px, 2px);">
                                        <div class="_e725ae-transform_wrap">
                                            <div title="Protected by Grammarly" class="_e725ae-status">&nbsp;</div>
                                        </div>
                                    </div>
                                </grammarly-btn>
                            </div>
                        </div>
                        <label for="publie">Publication</label>
                        <div class="demo-radio-button ">
                            <input class="radio-col-light-blue" name="publie" type="radio" id="true" value="1" checked/>
                            <label for="true">Oui</label>
                            <input class="radio-col-light-blue" name="publie" type="radio" value="0" id="false"/>
                            <label for="false">Non</label>
                        </div>
                        <div class="form-group form-float">
                            <label for="urlImage">Photo</label>
                            <div id="image-cropper-actualite">
                                <div class="cropit-preview"></div>
                                <input type="range" class="cropit-image-zoom-input" />
                                <!-- The actual file input will be hidden -->
                                <input type="file" class="cropit-image-input" />
                                <!-- And clicking on this button will open up select file dialog -->
                            </div>
                            <input id="urlImage" type="hidden" name="urlImage">
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
