@extends('admin.layouts.admin_master')

@section('title', 'View Brand Information')
@section('admin')
<style>
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .form-control {
        border: none;
        padding: 15px;
        margin-top: 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid #BA68C8;
    }

    input[type="text"]:disabled,
    input[type="date"]:disabled {
        background: transparent;
    }





    .labels {
        font-size: 16px;
        color: #BA68C8;
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
    img{
        border-radius: 10px;
    }
</style>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="d-flex flex-column align-items-center text-center "><img class="mt-5" width="500px"
                    height="400px" src="{{ asset($brand->image1) }}"><span class="font-weight-bold"><b>Name: </b>{{
                    ucwords($brand->name) }}</span><span class="text-black-50"><b>Model: </b>{{ ucwords($brand->model)
                    }}</span><span>
                </span></div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 style="font-size:45px;color:purple" class="text-right">Brand Information</h1>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control"
                            value="{{ $brand->name }}" disabled></div>

                    <div class="col-md-6"><label class="labels">Model</label><input type="text" class="form-control"
                            value="{{ $brand->model }}" disabled></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Type</label><input type="text" class="form-control"
                            value="{{ $brand->type }}" disabled></div>

                    <div class="col-md-6"><label class="labels">Make</label><input type="text" class="form-control"
                            value="{{ $brand->make }}" disabled></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Mileage</label><input type="text" class="form-control"
                            value="{{ $brand->mileage }}" disabled></div>

                    <div class="col-md-6"><label class="labels">Engine Size</label><input type="text"
                            class="form-control" value="{{ $brand->engine_size }}" disabled></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Gearbox</label><input type="text" class="form-control"
                            value="{{ $brand->gearbox }}" disabled></div>

                    <div class="col-md-6"><label class="labels">Power</label><input type="text" class="form-control"
                            value="{{ $brand->power }}" disabled></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">No. of Seats</label><input type="text"
                            class="form-control" value="{{ $brand->number_of_seats }}" disabled></div>

                    <div class="col-md-6"><label class="labels">Color</label><input type="text" class="form-control"
                            value="{{ $brand->color }}" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">First Registration</label><input type="date"
                            class="form-control" value="{{$brand->first_registration }}" disabled></div>



                    <div class="col-md-12"><label class="labels">Brand Category</label><input type="text"
                            class="form-control" placeholder="enter address line 1" value="{{ isset($brand->category) ? ucwords($brand->category->category_name) : "-" }}" disabled></div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span style="font-size:18px"
                        class="text-info">Price</span><span class="border px-3 p-1 add-experience"
                        style="font-size:18px;color:crimson"><i class="fas fa-dollar-sign"></i>&nbsp;{{ $brand->price
                        }}</span></div><br>


                <div class="col-md-12"><label class="labels">Extra Features</label><textarea disabled
                        style="border:1px solid purple" rows="14" cols="10" wrap="soft"
                        class="form-control">{{$brand->extra}}</textarea></div><br>
                <div class="col-md-12"><label class="labels">Additional Details</label><textarea disabled
                        style="border:1px solid purple" rows="14" cols="10" wrap="soft"
                        class="form-control">{!! $brand->description !!}</textarea></div>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <h1 style="color:purple;font-size:30px !important;">Other Images of the Brand</h1>
        <br>
        <br>
        <br>
        @php
        $images = DB::table('multipics')->where('brand_id', $brand->id)->get();
        @endphp
        @if(count($images) == 0)
        <h2 style="color:crimson">No Addition Brand Images</h2>
        <p><img src="{{ asset('uploads/no_image.jpg') }}" alt="No Image"></p>
        @else
        @foreach($images as $image)
        <div class="col-md-4 col-sm-6 col-lg-4 text-center p-3">
            <center>
                <img src="{{ asset($image->images) }}" class="img-responsive" alt="">
            </center>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>
</div>






@endsection