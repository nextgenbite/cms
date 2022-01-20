@extends('layouts.admin')


@section('content')
@if(Session::has('deleted_user'))


<p class="alert alert-bg-danger">{{session('deleted_user')}}</p>


@endif
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $row)
        <tr>
            <td>{{$row->id}} </td>
            <td> <img height="50" src="{{$row->photo ? $row->photo->file : 'http://placehold.it/400x400'}}" alt="" ></td>
            <td><a href="{{URL::to('admin/users/'. $row->id. '/edit')}}">{{$row->name}}</a></td>
            <td>{{$row->email}}</td>
            <td>{{$row->role ? $row->role->name : 'User has no role'}}</td>
            <td>{{$row->is_active == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{$row->created_at->diffForHumans()}}</td>
            <td>{{$row->updated_at->diffForHumans()}}</td>


        </tr>
        @endforeach

    </tbody>
</table>
@endsection


