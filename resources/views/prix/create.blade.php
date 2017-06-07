@extends('layouts.master')
<<<<<<< HEAD
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Création du prix</h2>
                </div>
                <div class="body">
                    @if($errors->any())
                        <div class="alert alert-danger">Le nom est déjà pris</div>
                    @endif
                    <form action="{{ action('Back_office\PrixCtrl@store') }}" id="prix-form" method="POST" novalidate="novalidate" target="_parent">
                        <label for="email_address">Nom</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="nom" required="" aria-required="true" aria-invalid="true" placeholder="Le nom du prix">
                            </div>
                        </div>
                        <label for="email_address">Description</label>
                        <div class="form-group">
                            <div class="form-line">
                                <grammarly-ghost spellcheck="false"><div data-reactroot="" data-id="10220f19-cf11-0450-10f9-fab7e936b21b" data-gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b" data-gramm="gramm" data-gramm_editor="true" class="gr_ver_2" contenteditable="true" style="position: absolute; color: transparent; overflow: hidden; white-space: pre-wrap; border-radius: 0px; box-sizing: border-box; height: 32px; width: 1280px; margin: 0px; padding: 6px 12px 6px 0px; z-index: 0; border-width: 0px; border-style: none; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(255, 255, 255); top: 0px; left: 0px;"><span style="display: inline-block; line-height: 20px; color: transparent; overflow: hidden; text-align: left; float: initial; clear: none; box-sizing: border-box; vertical-align: baseline; white-space: pre-wrap; width: 100%; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 14px; font-family: Roboto, Arial, Tahoma, sans-serif; letter-spacing: normal; text-shadow: none; height: 32px;"></span><br></div></grammarly-ghost><textarea rows="1" class="form-control no-resize auto-growth" name="description" placeholder="La description du prix" style="overflow: hidden; word-wrap: break-word; height: 32px; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none; background: transparent !important;" data-gramm="true" data-txt_gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b" data-gramm_id="10220f19-cf11-0450-10f9-fab7e936b21b" spellcheck="false" data-gramm_editor="true"></textarea><grammarly-btn><div data-reactroot="" class="_e725ae-textarea_btn _e725ae-show _e725ae-anonymous _e725ae-field_hovered" style="z-index: 2; transform: translate(1250px, 2px);"><div class="_e725ae-transform_wrap"><div title="Protected by Grammarly" class="_e725ae-status">&nbsp;</div></div></div></grammarly-btn>
                            </div>
                        </div>
                        <label for="email_address">Montant - CHF</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input value="" type="text" class="form-control" name="montant" required="" placeholder="Le montant du prix" aria-required="true" aria-invalid="true">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary waves-effect"></input>
                </div>
            </div>
        </div>
    </div>
@endsection
=======

@section('content')
    <form action="{{ url('prixs') }}" method="post" class="col s12" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container-fluid">
            <div class="block-header">
                <h2>BASIC FORM ELEMENTS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Membres
                                <small>Formulaire d'ajout de membres</small>
                            </h2>

                        </div>
                        <div class="body">

                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" required name="nom" id="nom"
                                                   value="{{ old('nom') }}" class="form-control">
                                            <label class="form-label">Nom</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" required name="montant" id="montant" value="{{ old('montant') }}"
                                                   class="form-control">
                                            <label class="form-label">Montant</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="description" id="description" value="{{ old('description') }}"></textarea>
                                            <label class="form-label">Description</label>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>


    {{--   <div class="row clearfix">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="card">
                   <div class="body">
                       <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">


                           <div class="dz-message">
                               <div class="drag-icon-cph">
                                   <i class="material-icons">touch_app</i>
                               </div>
                               <h3>Drop files here or click to upload.</h3>
                               <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually
                                   uploaded.)</em>
                           </div>
                           <div class="fallback">
                               <input name="file" type="file" multiple/>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>--}}


    <!-- Jquery Core Js -->
    <script src="{{url("back_office/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{url("back_office/plugins/bootstrap/js/bootstrap.js")}}"></script>
    <!-- Select Plugin Js -->
    <script src="{{url("back_office/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{url("back_office/plugins/jquery-slimscroll/jquery.slimscroll.js")}}"></script>
   <!-- Custom Css -->
    <link href="{{url("back_office/css/style.css")}}" rel="stylesheet">
    <script src="{{url("back_office/js/pages/forms/advanced-form-elements.js")}}"></script>

@endsection
>>>>>>> 408d099210ced45a1cc9b72d421e0015435005bd
