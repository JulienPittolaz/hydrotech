@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edition de l'article de presse</h2>
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
                    <form action="{{ action('Back_office\PresseCtrl@update', $id = $presse->id) }}" id="presse-form"
                          method="POST" novalidate="novalidate" target="_parent">
                        <label for="titreArticle">Titre de l'article</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$presse->titreArticle}}" type="text" class="form-control"
                                       name="titreArticle"
                                       required="" aria-required="true" aria-invalid="true">
                            </div>
                        </div>
                        <label for="dateParution">Date de parution</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$presse->dateParution}}" type="date" class="form-control"
                                       name="dateParution" required=""
                                       aria-required="true" aria-invalid="true" placeholder="La date de parution">
                            </div>
                        </div>
                        <label for="description">Description de l'article</label>
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
                                <textarea rows="1" class="form-control no-resize auto-growth" name="description"
                                          placeholder="La description de l'article de presse"
                                          style="overflow: hidden; word-wrap: break-word; height: 32px; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none; background: transparent !important;"
                                          data-gramm="true" data-txt_gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b"
                                          data-gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b" spellcheck="false"
                                          data-gramm_editor="true">{{$presse->description}}</textarea>
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
                        <label for="nomPresse">Nom de la presse</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$presse->nomPresse}}" type="text" class="form-control" name="nomPresse"
                                       required="" aria-required="true" aria-invalid="true"
                                       placeholder="Le nom de la presse">
                            </div>
                        </div>
                        <label for="url">Url de l'article</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="{{$presse->url}}" type="url" class="form-control" name="url" required=""
                                       aria-required="true" aria-invalid="true" placeholder="L'url de l'article">
                            </div>
                            <div class="help-info">Commence par http:// ou https://</div>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                </div>
            </div>
        </div>
    </div>
@endsection