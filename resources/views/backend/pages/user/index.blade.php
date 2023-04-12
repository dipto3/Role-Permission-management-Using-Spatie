@extends('backend.layouts.master')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Roles List</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">User Role</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>


                        @foreach ($users as $user)


                            <tr>
                                <th scope="row">{{ $user->id}}</th>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>

                                <td>


                                    @foreach ($user->roles as $role)

                                    <button class="btn btn-info">{{ $role->name }}</button>

                                    {{-- <span class="badge badge-info mr-1">
                                        {{ $role->name }}
                                    </span> --}}
                                    @endforeach
                                </td>

                                <td class="mx-auto">
                                    @if(Auth::guard('web')->user()->can('user.edit'))
                                 <a href="" class="btn btn-info">Edit</a><br><br>
                                 @endif
                                 @if(Auth::guard('web')->user()->can('user.edit'))
                                 <form action="{{url('/user-delete/'.$user->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
