@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Home Slide Page</h4>
                
                <form action="{{route('update.slide')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$homeSlide->id}}">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{$homeSlide->title}}" id="title">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" value="{{$homeSlide->short_title}}" id="short_title">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="video_url" class="col-sm-2 col-form-label">Video Url</label>
                        <div class="col-sm-10">
                            <input name="video_url" class="form-control" type="text" value="{{$homeSlide->video_url}}" id="video_url">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="home_slide" class="col-sm-2 col-form-label">Slhome_slideider Image</label>
                        <div class="col-sm-10">
                            <input name="home_slide" class="form-control" type="file" id="home_slide">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="home_slide" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" src="{{(!empty($homeSlide->home_slide)) ? url($homeSlide->home_slide) : url('no-image.jpg')}}" alt="avatar-5" class="rounded avatar-lg">
                        </div>
                    </div>
                    <!-- end row -->
                    <input class="btn btn-info waves-effect waves-light" type="submit" value="Update Slide">
                </form>
                
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function(){
        $('#home_slide').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection