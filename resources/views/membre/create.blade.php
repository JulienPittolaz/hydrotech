@extends('layouts.master')

@section('content')
    <form action="{{ url('membres') }}" method="post" class="col s12">
        {{ csrf_field() }}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            {{--ID de l'article--}}
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <label for="prenom">Prénom</label>
                                <input type="text" required name="prenom" id="prenom" value="{{ old('prenom') }}"/>
                            </div>
                            <h2 class="card-inside-title">Floating Label Examples</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control">
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <label for="nom">Nom</label>
                                <input type="text" required name="nom" id="nom" value="{{ old('nom') }}"/>
                            </div>
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <label for="dateNaissance">Date de naissance</label>
                                <input type="date" required name="dateNaissance" id="dateNaissance" value="{{ old('dateNaissance') }}"/>
                            </div>
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <label for="section">Section</label>
                                <input type="text" required name="section" id="section" value="{{ old('section') }}"/>
                            </div>
                            <div class="input-field col s6">
                                {{--min="1" assure ne valide que des nombres positifs. step="1" ne valide que des nombres entiers--}}
                                <label for="description">Description</label>
                                <input type="text" required name="description" id="description" value="{{ old('description') }}"/>
                            </div>
                            {{--Prix en CHF de l'article--}}
                            <div class="input-field col s6">
                                {{--min="0" assure ne valide que des nombres positifs--}}
                                <label for="prixUnitaire">Prix en CHF</label>
                                <input type="number" min="0" step="0.01" name="prixUnitaire" id="prixUnitaire" required value="{{ old('prixUnitaire') }}"/>
                            </div>
                            {{--Description de l'article--}}
                            <div class="input-field col s12">
                                {{--Aucune restriction à faire pour ce champ--}}
                                <label for="descriptif">Descriptif</label>
                                <input type="text" name="descriptif" id="descriptif" required value="{{ old('descriptif') }}"/>
                            </div>
                            {{--Choix de la disponibilité de l'article--}}
                            <div class="col s6">
                                {{--TODO : trouver un meilleur système...--}}
                                Article disponible ?
                                @if(old('disponibilite') === "Non")
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-oui" value="Oui"/>
                                        <label for="dispo-oui">Oui</label>
                                    </p>
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-non" value="Non" checked/>
                                        <label for="dispo-non">Non</label>
                                    </p>
                                @else
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-oui" value="Oui" checked/>
                                        <label for="dispo-oui">Oui</label>
                                    </p>
                                    <p>
                                        <input name="disponibilite" type="radio" id="dispo-non" value="Non"/>
                                        <label for="dispo-non">Non</label>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light amber darken-4">Mémoriser</button>
    </form>
@endsection
