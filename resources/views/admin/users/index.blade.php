@extends('layouts.admin')




@section('content')
    @if(Session::has('delete_user'))

        <p class="bg-danger">{{session('delete_user')}}</p>

    @endif
    <h1 class="text-center">All users</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
            @if($users)

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img height="50" width="50" src="{{$user->photo ? $user->photo->file :'http://placehold.it/400x400'}}" alt="" class="img-circle"></td>
                        <td><a href="{{action('AdminUsersController@edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role ? $user->role->name : 'Has no role'}}</td>
                        <td>{{$user->is_active ==1 ? 'Active':'Not active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>

                    </tr>

                @endforeach
            @endif
        </tbody>
    </table>
    </div>



@stop