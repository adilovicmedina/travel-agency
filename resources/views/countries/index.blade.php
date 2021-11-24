@extends('layouts.app')

@section('dashboard_content')
            <div class="col-lg-6" style="margin-top: 120px;">
                <h2 class="title-1 m-b-25">Countries</h2>
            </div>
            <div class="col-lg-6" style="margin-top: 130px; text-align: right;">
                <a href="{{ route('countries.create') }}">CREATE</a>
            </div>
        </div>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>continent</th>
                        <th>photo</th>
                        <th class="text-right">edit</th>
                        <th class="text-right">delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getCountryList as $key => $country)
                    <tr>
                        <td>
                            <a href="{{ route('countries.show', $country->id) }}"> {{ $country->name }} </a>
                        </td>
                        <td><a href="{{ route('continents.show', $country->continent_id) }}">
                                {{$country->continent->name}} </a></td>
                        <td><img src="{{ asset($country->photo) }} "></td>

                        <td class="text-right" style="margin:auto;"><a class="btn btn-primary btn-sm"
                                href="{{ route('countries.edit', $country->id) }}">Edit</a></td>
                        <td class="text-right"> {!! Form::open(['method' => 'DELETE','route' => ['countries.delete',
                            $country->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection