@extends('admin.layouts.admin_master')



@section('title', 'Brand Images')
@section('admin')
<div class="container mt-5">
    <div name="header">
        <h2 class="text-center">
            Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2><br><br>
    </div>
    <div class="row">
        <div class="col-md-2 col-lg-2 col-sm-12"></div>
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Brand Image</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.images', $images->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $images->images }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category">Image</label>
                                    <input id="image" type="file" name="images"
                                        class="form-control @error('images') border-danger @enderror"
                                        value="{{ $images->images }}">
                                    @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group mb-3">
                                        <div class="controls">
                                            <img src="{{ (!empty($images->images))? url($images->images) : url('uploads/no_image.jpg') }}"
                                                style="width: 100px" alt="image" id="showImage" class="img-responsive">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category">Brand</label>
                            <select name="brand_id" class="form-control @error('brand_id') border-danger @enderror">

                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach


                            </select>
                            @error('brand_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" value="Update" class="btn btn-info" style="width: 100%">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-12"></div>
    </div>


</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src', e.target.result)
          }
          reader.readAsDataURL(e.target.files[0]);
        });
    });

</script>