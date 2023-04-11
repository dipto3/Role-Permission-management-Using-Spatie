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

                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)


                            <tr>
                                <th scope="row">{{$role->id}}</th>
                                <td>{{$role->name}}</td>

                                <td>
                                 <a href="{{url('/roles-edit/'.$role->id)}}" class="btn btn-info">Edit</a>
                                 <a href="" class="btn btn-danger">Delete</a>


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
