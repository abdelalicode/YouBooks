@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="my-5">LIST OF USERS</h2>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Role</th>
                <th scope="col">Assign a Role</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{ strtoupper($user->role->name) }}</td>
                <td>
                    <form class="d-flex gap-2" action="{{ route('users.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <select class="form-select w-50" aria-label="Default select example" name="role_id">
                            <option selected>Select a Role</option>
                            @foreach ($roles as $role)
                            <option  value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                          <button type="submit" class="btn btn-warning text-white">></button>
                      </form>
                </td>
              </tr>
              @endforeach
        
       
    </tbody>
</table>
    </div>
</div>
@endsection