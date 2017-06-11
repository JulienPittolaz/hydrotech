@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des associations
                    </h2>
                </div>
                <div class="body">

                    @foreach($editions as $edition)
                        <ul>
                            <li>{{$edition}}</li>
                            {{--@foreach($objets as $objet)
                                <ul><li>{{$objet->titre}}</li></ul>
                            @endforeach--}}
                        </ul>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection