@extends('layouts.app')

@section('dashboard_content')

<div class="col-lg-12" style="margin-top: 120px;">
    <div class="row">
         <div class="col-6">
            <h2 class="title-1 m-b-25">Tours</h2>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="{{ route('tours.create') }}">CREATE</a>
        </div>
    </div>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
               <tr>
                    <th>name</th>
                    <th>country</th>
                    <th>location</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>price</th>
                    <th class="text-right">edit</th>
                    <th class="text-right">delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($getTourList as $key => $tour)
                <tr>
                    <td>
                        <a href="{{ route('tours.show', $tour->id) }}"> {{ $tour->name }} </a>
                    </td>
                    <td>{{$tour->country->name}}</td>
                    <td>{{$tour->location->name}}</td>
                    <td> {{ $tour->start_date }}</td>
                    <td>{{ $tour->end_date }}</td>
                      <td>{{ $tour->price }}</td>
                    <td class="text-right" style="margin:auto;">
                        <a class="btn btn-primary btn-sm" href="{{ route('tours.edit', $tour->id) }}">Edit</a>
                    </td>
                     <td class="text-right">
                        {!! Form::open(['method' => 'DELETE','route' => ['tours.delete', $tour->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $getTourList->links() !!}
        </div>
    </div>
</div>
@endsection
