@extends('layouts.app')

@section('dashboard_content')
                            <div class="col-lg-12" style="margin-top: 120px;">
                                <div class="row">
                                    <div class="col-6">
                                <h2 class="title-1 m-b-25">Continents</h2>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                <a href="{{ route('continents.create') }}">CREATE</a>
                                </div>
                                </div>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>name</th>

                                                <th class="text-right">edit</th>
                                                <th class="text-right">delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($continents as $key => $continent)
                                            <tr>
                                                <td>
                                                {{ $continent->name }}</td>


                                                <td class="text-right" style="margin:auto;"> <a class="btn btn-primary btn-sm" href="{{ route('continents.edit', $continent->id) }}">Edit</a></td>
                                                <td class="text-right">{!! Form::open(['method' => 'DELETE','route' => ['continents.delete', $continent->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

@endsection
