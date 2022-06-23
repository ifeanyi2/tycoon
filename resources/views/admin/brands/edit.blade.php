@extends('admin.layouts.admin_master')



@section('title', 'Create Brand')
@section('admin')
<div class="container mt-5">
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2>
    </div>
    <div class="row">
        <div class="col-md-2 col-lg-2 col-sm-12"></div>
        <div class="col-md-8 col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Edit Brand
                </div>
                <div class="card-body">
                    <form action="{{ route('update.brand', $brand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $brand->image1 }}">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Name</label>
                                    <input type="text" name="name"
                                        class="form-control border-2 @error('name') border-danger @enderror"
                                        value="{{ $brand->name }}" autofocus>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Type</label>
                                    <input type="text" name="type"
                                        class="form-control border-2 @error('type') border-danger @enderror"
                                        value="{{ $brand->type }}">
                                    @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Make</label>
                                    <input type="text" name="make"
                                        class="form-control border-2 @error('make') border-danger @enderror"
                                        value="{{ $brand->make }}">
                                    @error('make')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Model</label>
                                    <input type="text" name="model"
                                        class="form-control border-2 @error('model') border-danger @enderror"
                                        value="{{ $brand->model }}">
                                    @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">First Registration</label>
                                    <input type="date" name="first_registration"
                                        class="form-control border-2 @error('first_registration') border-danger @enderror"
                                        value="{{ $brand->first_registration }}">
                                    @error('first_registration')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Mileage</label>
                                    <input type="text" name="mileage"
                                        class="form-control border-2 @error('mileage') border-danger @enderror"
                                        value="{{ $brand->mileage }}">
                                    @error('mileage')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Fuel</label>
                                    <input type="text" name="fuel"
                                        class="form-control border-2 @error('fuel') border-danger @enderror"
                                        value="{{ $brand->fuel }}">
                                    @error('fuel')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Engine size</label>
                                    <input type="text" name="engine_size"
                                        class="form-control border-2 @error('engine_size') border-danger @enderror"
                                        value="{{ $brand->engine_size }}">
                                    @error('engine_size')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Power</label>
                                    <input type="text" name="power"
                                        class="form-control border-2 @error('power') border-danger @enderror"
                                        value="{{ $brand->power }}">
                                    @error('power')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Gear Box</label>
                                    <input type="text" name="gearbox"
                                        class="form-control border-2 @error('gearbox') border-danger @enderror"
                                        value="{{ $brand->gearbox }}">
                                    @error('gearbox')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Number of Seats</label>
                                    <input type="text" name="number_of_seats"
                                        class="form-control border-2 @error('number_of_seats') border-danger @enderror"
                                        value="{{ $brand->number_of_seats }}">
                                    @error('number_of_seats')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Doors</label>
                                    <input type="text" name="doors"
                                        class="form-control border-2 @error('doors') border-danger @enderror"
                                        value="{{ $brand->doors }}">
                                    @error('doors')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Color</label>
                                    <input type="text" name="color"
                                        class="form-control border-2 @error('color') border-danger @enderror"
                                        value="{{ $brand->color }}">
                                    @error('color')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Price</label>
                                    <input type="text" name="price"
                                        class="form-control border-2 @error('price') border-danger @enderror"
                                        value="{{ $brand->price }}">
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Main Image</label>
                                    <input id="image" type="file" name="image1"
                                        class="form-control border-2 @error('image1') border-danger @enderror"
                                        value="{{ $brand->image1 }}">
                                    @error('image1')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group mb-3">
                                    <div class="controls">
                                        <img src="{{ (!empty($brand->image1))? url($brand->image1) : url('uploads/no_image.jpg') }}"
                                            style="width: 90px" alt="image" id="showImage" class="img-responsive">
                                    </div>
                                </div>
                            </div>

                        </div>
                           <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="category">Brand Category</label>
                                    <select name="category_id"
                                        class="form-control border-2 @error('category_id') border-danger @enderror">
                                      <option value="{{ $brand->category_id }}">{{ $brand->category->category_name }}</option>
                                      <option value=""> -------------- </option>
                                      @foreach($category as $key => $value)
                                         <option value="{{ $value->id }}">{{ $value->category_name }}</option>   
                                      @endforeach
                                     
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           

                        </div>
                        <!-- <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                       <div class="form-group mb-3">
                                          <label for="category">Extra Image1 (optional)</label>
                                          <input id="image1" type="file" name="image2" class="form-control border-2 @error('image2') border-danger @enderror" value="">
                                            @error('image2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                       </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                       <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                          <div class="controls">
                                            <img src="{{ url('uploads/no_image.jpg') }}" style="width: 90px" alt="image" id="showImage1" class="img-responsive">
                                           </div>
                                        </div>
                                       </div>
                                    </div>
                                    
                                </div> -->
                        <!-- <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                       <div class="form-group mb-3">
                                          <label for="category">Extra Image2 (Optional)</label>
                                          <input id="image2" type="file" name="image3" class="form-control border-2 @error('image3') border-danger @enderror" value="">
                                            @error('image3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                       </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                       <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                          <div class="controls">
                                            <img src="{{ url('uploads/no_image.jpg') }}" style="width: 90px" alt="image" id="showImage2" class="img-responsive">
                                           </div>
                                        </div>
                                       </div>
                                    </div>
                                    
                                </div> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="category">Extra Features</label>
                                    <textarea style="width:100%;border:none;background-color:#ddd" name="extra"
                                        class="form-group" id="" cols="30" rows="10">{{ $brand->extra }}</textarea>
                                    @error('extra')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="category">Description</label>
                                    <textarea style="width: 100%;border:none;background-color:#ddd" name="description"
                                        class="form-group" id="" cols="30"
                                        rows="10">{{ $brand->description }}</textarea>
                                    @error('extra')
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