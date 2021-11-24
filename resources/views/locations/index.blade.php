


@extends('layouts.app')


@section('dashboard_content')
                            <div class="col-lg-12" style="margin-top: 120px;">
                                <div class="row">
                                    <div class="col-6">
                                <h2 class="title-1 m-b-25">Locations</h2>
                                </div>
                                <div class="col-6" style="text-align: right;"> 
                                <a href="{{ route('locations.create') }}">CREATE</a>
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
                                        @foreach ($locations as $key => $location)
                                            <tr>
                                                <td> 
                                                {{ $location->name }}</td>
                                               
                                                
                                                <td class="text-right" style="margin:auto;"> <a class="btn btn-primary btn-sm" href="{{ route('locations.edit', $location->id) }}">Edit</a></td>
                                                <td class="text-right">{!! Form::open(['method' => 'DELETE','route' => ['locations.delete', $location->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                 
                                </div>
                            </div>
                        </div>
@endsection