@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">About Page</h4>
                
                <form action="{{route('update.about')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$aboutPage->id}}">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{$aboutPage->title}}" id="title">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" value="{{$aboutPage->short_title}}" id="short_title">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            
                            <textarea required="" name="short_description" class="form-control" rows="5" id="short_description">
                                {{$aboutPage->short_description}}
                            </textarea>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="elm1" class="col-sm-2 col-form-label">Long Description</label>
                        <div class="col-sm-10">
                            <textarea id="elm1" class="form-control" name="long_description" aria-hidden="true">{{$aboutPage->long_description}}</textarea>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
                        <div class="col-sm-10">
                            <input name="about_image" class="form-control" type="file" id="about_image">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="showImage" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" src="{{(!empty($aboutPage->about_image)) ? url($aboutPage->about_image) : url('no-image.jpg')}}" alt="About_image" class="rounded avatar-lg">
                        </div>
                    </div>
                    <!-- end row -->
                    <input class="btn btn-info waves-effect waves-light" type="submit" value="Update About">
                </form>
                
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function(){
        $('#about_image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection