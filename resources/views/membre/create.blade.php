@extends('layouts.master')

@section('content')
    <form action="{{ url('membres') }}" method="post" class="col s12" enctype="multipart/form-data">
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
                                            <input type="text" required name="prenom" id="prenom"
                                                   value="{{ old('prenom') }}" class="form-control">
                                            <label class="form-label">Prénom</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" required name="nom" id="nom" value="{{ old('nom') }}"
                                                   class="form-control">
                                            <label class="form-label">Nom</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" name="dateNaissance" id="dateNaissance">
                                            <label class="form-label">Date de naissance</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" required name="adresseMail" id="adresseMail"
                                                   value="{{ old('adresseMail') }}" class="form-control">
                                            <label class="form-label">Adresse E-Mail</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" required name="section" id="section"
                                                   value="{{ old('section') }}" class="form-control">
                                            <label class="form-label">Section</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" required name="role" id="role"
                                                   value="{{ old('role') }}" class="form-control">
                                            <label class="form-label">Role</label>
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


                                <div class="col-sm-12">
                                    <label class="form-label">Photo profil</label>
                                    <div class="form-group card">
                                        <div class="dropzone dz-clickable">
                                            <div class="dz-message">
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">touch_app</i>
                                                </div>
                                                <h3>Drop files here or click to upload.</h3>
                                                <em>(This is just a demo dropzone. Selected files are
                                                    <strong>not</strong> actually uploaded.)</em>
                                            </div>
                                            <div class="fallback ">
                                                <input name="photoProfil" id="photoProfil" type="file" required
                                                       value="{{ old('photoProfil') }}" />
                                            </div>
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
