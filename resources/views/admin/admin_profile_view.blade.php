@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            
                <div class="my-4 text-center">
                    <img class="rounded-circle avatar-lg" src="{{(!empty($adminData->propic)) ? url('upload/admin_images/'. $adminData->propic) : url('no-image.jpg')}}" alt="Profile Picture">
                </div>
            
            <div class="card-body">
                <h4 class="card-title"><strong>Name:</strong> {{$adminData->name}}</h4>
                <hr>
                <h4 class="card-title"><strong>Email:</strong> {{$adminData->email}}</h4>
                <hr>
                <h4 class="card-title"><strong>User Name:</strong> {{$adminData->username}}</h4>
                <hr>
                <a href="{{route('admin.edit')}}" type="button" class="btn btn-info waves-effect waves-light mt-2">Edit Profile</a>
            </div>
        </div>
    </div>


</div>
    
@endsection