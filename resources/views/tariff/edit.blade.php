@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="pagetitle">
    <h1>Категории</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Категории</a></li>
            <li class="breadcrumb-item active">Редактировать</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Редактировать</h5>

                    <form class="row g-3" action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        @foreach (languages() as $key => $lng)

                        <div class="col-12">
                            <label for="name_{{$lng}}" class="form-label">Имя {{ Str::upper($lng)}}</label>
                            <input type="text"
                                class='form-control @error("translations.$lng.name") _incorrectly @enderror'
                                id="name_{{$lng}}" name="translations[{{$lng}}][name]"
                                value='{{ $category->translate($lng)->name }}'>
                            @error("translations.$lng.name")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach

                        <div class="col-12">
                            <label for="key" class="form-label">Ключ</label>
                            <input type="text"
                                class='form-control @error("key") _incorrectly @enderror'
                                id="key" name="key"
                                value='{{ $category->key}}'>
                            @error("key")
                                <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="text-start">
                            <button class="btn btn-primary">Сохранить</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js-scripts')
    <script src="{{ asset('assets/js/uploade-image.js') }}"></script>
@endsection
