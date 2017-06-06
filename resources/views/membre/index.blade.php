{{--@extends('layouts.master')

@section('title', 'Membres')
@section('navbar')
    @include('layouts.menu-fab', ['fab_url' => 'membres/create', 'fab_title' => 'Nouveau membre'])
@endsection--}}

@section('content-title', 'Tous les membres')

    <div class="col s12">
        <table class="striped bordered">
            <thead>
                <tr>
                    <th class="center-align">id</th>
                    <th>Adresse Mail</th>
                    <th class="right-align">Prénom</th>
                    <th class="right-align">Nom</th>
                    <th class="right-align">Date de naissance</th>
                    <th class="right-align">Section</th>
                    <th class="right-align">Description</th>
                    <th class="right-align">Role</th>
                    <th class="right-align">Photo</th>
                    {{--<th class="center-align">Actions</th>--}}
                </tr>
            </thead>
            <tbody>
                @foreach($membres as $key => $value)
                    <tr>
                        <td class="center-align">{{ $value->id}}</td>
                        <td>{{ $value->adresseMail}}</td>
                        <td class="right-align">{{ $value->prenom}}</td>
                        <td class="right-align">{{ $value->nom}}</td>
                        <td class="right-align">{{ $value->dateNaissance}}</td>
                        <td class="right-align">{{ $value->section}}</td>
                        <td class="right-align">{{ $value->description}}</td>
                        <td class="right-align">{{ $value->role}}</td>
                        <td class="right-align"><img src="{{ $value->photoProfil}}"></td>
                        <td class="center-align">
                            {{--<a class="btn-floating waves-effect waves-light teal" href="{{ url('articlepublicitaire/'. $value->id_article .'/edit') }}"><i class="material-icons">edit</i></a>--}}
                            {{--<a class="btn-floating waves-effect waves-red white" href="{{ url('articlepublicitaire/'. $value->id_article .'/destroy') }}"><i--}}
                            {{--class="material-icons error-txt">delete_forever</i></a>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>