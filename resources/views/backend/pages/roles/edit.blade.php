@extends('backend.layouts.master')

@section('content')
<div class="col-lg-6 mt-5">
     <div class="card">
         <div class="card-body">
             <h4 class="header-title">Create Role</h4>

        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="">Role name</label>
                <input type="text" class="form-control" name="name" >
            </div>

            <div class="form-group">
                <label for="name">Permissions</label>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                    <label class="form-check-label" for="checkPermissionAll">All</label>
                </div>
                <hr>

                @php $i = 1; @endphp
                @foreach ($permission_groups as $group)
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                            </div>
                        </div>

                        <div class="col-9 role-{{ $i }}-management-checkbox">
                            @php
                                $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                $j = 1;
                            @endphp
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @php  $j++; @endphp
                            @endforeach
                            <br>
                        </div>

                    </div>
                    @php  $i++; @endphp
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    </div>
</div>

@endsection
@section('scripts')
<script>

         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });


         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
</script>
@endsection
