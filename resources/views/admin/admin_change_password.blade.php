@extends('admin.admin_master')
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Change Password Page</h4>
                <br>
                <br>
                
                @if(count($errors))
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                @endforeach
                @endif

                <form action="{{route('update.password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input name="oldPassword" class="form-control" type="password" id="oldPassword">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input name="newPassword" class="form-control" type="password" id="newPassword">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input name="confirmPassword" class="form-control" type="password" id="confirmPassword">
                        </div>
                    </div>
                    <!-- end row -->
                   
                    <!-- end row -->
                    <input class="btn btn-info waves-effect waves-light" type="submit" value="Change Password">
                </form>
                
            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection