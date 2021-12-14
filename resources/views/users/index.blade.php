@extends('layouts.app')

@section('dashboard_content')

      <div class="row">
                            <div class="col-lg-12" style="margin-top: 120px;">
                                <div class="row">
                                    <div class="col-6">
                                <h2 class="title-1 m-b-25">Users</h2>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                <a href="{{ route('users.create') }}">CREATE</a>
                                </div>
                                </div>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th scope="col" width="1%">#</th>
                                            <th>email</th>
                                                <th>username</th>
                                                <th>roles</th>
                                                <th class="text-right">show</th>
                                                <th class="text-right">edit</th>
                                                <th class="text-right">delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                {{ $user->id }}</td>

                                                <td> {{ $user->email }} </td>
                                                <td> {{ $user->username }} </td>
                                                <td>
                                                @foreach($user->roles as $role)
                                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                                @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm">Show</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex">
            {!! $users->links() !!}
        </div>
                                </div>
                            </div>
                        </div>
@endsection
