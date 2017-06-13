@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des associations de sponsors par catégorie et par année
                    </h2>
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
                    <ul>
                        @foreach($editions as $edition)

                            <li>{{$edition->annee}}</li>
                            <ul>
                                @foreach($edition->categorie as $categorie)
                                    <li>{{$categorie->nom}}</li>
                                    <ul>
                                        @foreach($categorie->categorieeditionsponsors->where('actif', true)->where('edition_id', $edition->id) as $assoc)
                                            <ul>
                                                <li>
                                                    {{$assoc->sponsor->nom}}
                                                    <form method="post"
                                                          action="{{action('Back_office\CategorieEditionSponsorCtrl@destroy', ['categorie_id' => $categorie->id, 'edition_id' => $edition->id, 'sponsor_id' => $assoc->sponsor->id])}}"
                                                          accept-charset="UTF-8">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token"
                                                               value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn bg-red waves-effect">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>


                                                </li>
                                            </ul>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>

                            <a href="{{action('Back_office\CategorieEditionSponsorCtrl@create',$edition->annee)}}"
                               target="_parent">
                                <button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button>
                            </a>

                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection