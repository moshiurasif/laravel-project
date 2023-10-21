@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Admin Profile</h4>
                
                <form action="{{route('store.profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" value="{{$editData->name}}" id="name">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="email" value="{{$editData->email}}" id="email">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" value="{{$editData->username}}" id="username">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="propic" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input name="propic" class="form-control" type="file" id="propic">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="propic" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" src="{{(!empty($editData->propic)) ? url('upload/admin_images/'. $editData->propic) : url('no-image.jpg')}}" alt="avatar-5" class="rounded avatar-lg">
                        </div>
                    </div>
                    <!-- end row -->
                    <input class="btn btn-info waves-effect waves-light" type="submit" value="Update Profile">
                </form>
                
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function(){
        $('#propic').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection