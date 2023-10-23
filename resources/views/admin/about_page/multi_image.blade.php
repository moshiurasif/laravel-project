@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Multi Image</h4>
                
                <form action="{{route('store.multi.image')}}" method="post" enctype="multipart/form-data">
                    @csrf
 
                    <div class="row mb-3">
                        <label for="multi_image" class="col-sm-2 col-form-label">Multi Image</label>
                        <div class="col-sm-10">
                            <input name="multi_image[]" class="form-control" type="file" multiple id="multi_image">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="showImage" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" src="{{url('no-image.jpg')}}" alt="Mutltiple Image" class="rounded avatar-lg">
                        </div>
                    </div>
                    <!-- end row -->
                    <input class="btn btn-info waves-effect waves-light" type="submit" value="Update Multi Image">
                </form>
                
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function(){
        $('#multi_image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection