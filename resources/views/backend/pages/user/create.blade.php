@extends('backend.layouts.master')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title ">Create User</h4>
<form action="{{url('/user-store')}}" method="post">
    @csrf

<div class="col-md-6  mx-auto">
    <div class="form-group">
        <label for="">User name</label>
        <input type="text" class="form-control" name="name" >
    </div>
    <div class="form-group">
        <label for="">User Email</label>
        <input type="text" class="form-control" name="email" >
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="text" class="form-control" name="password" >
    </div>

    <div class="form-group">
        <label for="">Role</label>
        <select name="roles"  class="form-control" name="name" >
            <option value="">Select role</option>
            @foreach ($roles as $role)
              <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach

        </select>

    </div>


    <button style="" type="submit" class="btn btn-primary d-flex mx-auto">Submit</button>
</div>
  </form>
            </div>
        </div>
    </div>
@endsection
