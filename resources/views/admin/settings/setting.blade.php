@extends('admin.layouts.admin_master')



@section('title', 'Site Setting')
@section('admin')
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-2 col-lg-2 col-sm-12"></div>
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Site Setting</h3>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                        </button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('update.setting', $setting->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
                        <br>
                        <input type="hidden" name="old_banner" value="{{ $setting->banner }}">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Email</label>
                                    <input type="email" name="email"
                                        class="form-control border-2 @error('email') border-danger @enderror"
                                        value="{{ $setting->email }}" autofocus>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Phone</label>
                                    <input type="tel" name="phone"
                                        class="form-control border-2 @error('phone') border-danger @enderror"
                                        value="{{ $setting->phone }}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Logo</label>
                                    <input id="image" type="file" name="logo"
                                        class="form-control border-2 @error('logo') border-danger @enderror" value="{{ $setting->logo }}">
                                    @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group mb-3">
                                    <div class="controls">
                                        <img src="{{ (!empty($setting->logo))? url($setting->logo) : url('uploads/no_image.jpg') }}" style="width: 90px" alt="image"
                                            id="showImage" class="img-responsive">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Image Banner</label>
                                    <input id="image1" type="file" name="banner"
                                        class="form-control border-2 @error('banner') border-danger @enderror" value="{{ $setting->banner }}">
                                    @error('banner')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group mb-3">
                                    <div class="controls">
                                        <img src="{{ (!empty($setting->banner))? url($setting->banner) : url('uploads/no_image.jpg') }}" style="width: 90px" alt="image"
                                            id="showImage1" class="img-responsive">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ $setting->address }}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="category">About us</label>
                                    <textarea style="width:100%;border:none;background-color:#ddd" name="about"
                                        class="form-group" id="" cols="30" rows="10">{{ $setting->about }}</textarea>
                                    @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="category">Services</label>
                                    <textarea style="width: 100%;border:none;background-color:#ddd" name="services"
                                        class="form-group" id="" cols="30" rows="10">{{ $setting->services }}</textarea>
                                    @error('services')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <input type="submit" value="Update" class="btn btn-primary" style="width: 100%;">
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
    $(document).ready(function(){
        $('#image1').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage1').attr('src', e.target.result)
          }
          reader.readAsDataURL(e.target.files[0]);
        });
    });
    $(document).ready(function(){
        $('#image2').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage2').attr('src', e.target.result)
          }
          reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>