@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Name: {{$adminData->name}}</h4>
                <h4 class="card-title">Email: {{$adminData->email}}</h4>
                <h4 class="card-title">User Name: {{$adminData->username}}</h4>
                
                <a href="{{route('admin.edit')}}" type="button" class="btn btn-info waves-effect waves-light">Edit Profile</a>
            </div>
        </div>
    </div>


</div>
    
@endsection