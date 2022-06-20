<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Welcome Back <span class="text-success">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-2 col-sm-12 col-md-2"></div>
                <div class="col-8 col-sm-12 col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            <h3 class="cart-title">Edit Brand Images</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.images', $images->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                 <input type="hidden" name="old_image" value="{{ $images->images }}">
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group mb-3">
                                        <label for="category">Image</label>
                                        <input id="image" type="file" name="images" class="form-control @error('images') border-danger @enderror" value="{{ $images->images }}">
                                        @error('images')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3 col-sm-12">
                                        <div class="form-group mb-3">
                                            <div class="controls">
                                                <img src="{{ (!empty($images->images))? url($images->images) : url('uploads/no_image.jpg') }}" style="width: 100px" alt="image" id="showImage" class="img-responsive">
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
                 <div class="col-2 col-sm-12 col-md-2"></div>
            </div>
        </div>
    </div>
</x-app-layout>
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
