@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Liste des articles de presse
                    </h2>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="body">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{route('presse.create')}}" target="_parent"><button type="button" class="m-b-20 btn bg-green waves-effect">NOUVEAU</button></a>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                       id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row">
                                        <th rowspan="1" colspan="1" style="width: 20px !important;">Action</th>
                                        @foreach($columns as $column)
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 210px;">
                                                {{$column}}
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1" style="width: 20px !important;">Action</th>
                                        @foreach($columns as $column)
                                        <th rowspan="1" colspan="1">{{$column}}</th>
                                        @endforeach
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    {{--*/ $i = 0 /*--}}
                                    @foreach($presses as $presse)
                                        @if($presse->iteration % 2 == 0)
                                            {{--*/ $class = odd /*--}}
                                        @else
                                            {{--*/ $class = even /*--}}
                                        @endif
                                        {{--*/ $i++ /*--}}
                                        <tr role="row" class="odd">
                                            <td style="width: 20px !important;">
                                                <a target="_parent" href="{{ route('presse.edit', $presse->id) }}">
                                                <button type="button" class="btn btn-primary waves-effect">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                                </a>
                                                <form method="post" action="{{action('Back_office\PresseCtrl@destroy', $presse->id)}}" accept-charset="UTF-8">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn bg-red waves-effect">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="sorting_1">{{$presse->dateParution}}</td>
                                            <td>{{$presse->titreArticle}}</td>
                                            <td>{{$presse->description}}</td>
                                            <td>{{$presse->nomPresse}}</td>
                                            <td>{{$presse->url}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
@endsection