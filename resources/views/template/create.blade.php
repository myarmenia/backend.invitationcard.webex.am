@extends('layouts.auth-app')
@section('link')
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
<div class="pagetitle">
    <h1>Press Release</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Press Release</a></li>
            <li class="breadcrumb-item active">Create</li>


        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Press Release</h5>

                    <form class="row g-3" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        
                        <div class="logo_div "></div>
                        @foreach (languages() as $key => $lng)
                        <div class="col-12">
                            <label for="title_{{$lng}}" class="form-label">Title {{ Str::upper($lng)
                                }}</label>
                            <input type="text"
                                class='form-control @error("translations.$key.title") _incorrectly @enderror'
                                id="title_{{$lng}}" name="translations[{{$key}}][title]"
                                value='{{ old("translations.$key.title")}}'>
                            @error("translations.$key.title")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach

                        <div class="col-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') _incorrectly @enderror" id="date"
                                name="date" value="{{ old('date')}}">
                            @error('date')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="time" class="form-label">Date</label>
                            <input type="time" class="form-control @error('time') _incorrectly @enderror" id="time"
                                name="time" value="{{ old('time')}}">
                            @error('time')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>



                        <div class="col-lg-12">
                            <label for="" class="form-label">Links </label>
                            <div class="links_div">

                                @if (is_array(old('links')) || is_object(old('links')))
                                @foreach (old('links') as $key => $item)
                                <div>
                                    <div class=" col-lg-6 mr-3 d-flex mt-2">
                                        <input type="url" class="form-control {{ $item == null ? '_incorrectly' : ''}}"
                                            name="links[]" value="{{$item ?? ''}}">
                                        <i class="icon ri-delete-bin-2-line remove_link"></i>
                                    </div>
                                    @if ($item == null)
                                    <div class="error_message">The link field is required. </div>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                <div class=" col-lg-6 mr-3 d-flex">
                                    <input type="url" class="form-control @error('links.*') _incorrectly @enderror"
                                        name="links[]">
                                    <i class="icon ri-delete-bin-2-line remove_link"></i>
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="pt-1">Add Link</div>

                            <i class="icon px-3 ri-add-box-line" id="add_link"></i>
                        </div>

                        <div class="col-12">
                            <label for="items" class="form-label">Files</label>
                            <input type="file" class="form-control" id="items" name="items[]" multiple
                                accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG, video/mp4, video/mov, video/ogg, video/qt">
                            @error('items')
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="items_div d-flex flex-wrap justify-content-between"> </div>

                        <div class="text-start">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('js-scripts')
<script src="{{ asset('assets/back/js/press-releases.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection
