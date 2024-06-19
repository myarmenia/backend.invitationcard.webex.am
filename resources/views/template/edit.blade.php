@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="pagetitle">
    <h1>Шаблоны</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="">Шаблоны</a></li>
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

                    <form class="row g-3" action="{{route('template.update', $template->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <label for="category" class="form-label">Категория</label>
                            <select id="category" class="form-select" name="category_id">
                                <option value="" selected disabled>Категория</option>
                                @foreach (categories() as $category)
                                    <option value="{{$category->id}}" {{ $template->category_id == $category->id ? 'selected' : ''}}>{{$category->translation->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @foreach (languages() as $key => $lng)

                        <div class="col-12">
                            <label for="name_{{$lng}}" class="form-label">Имя {{ Str::upper($lng)}}</label>
                            <input type="text"
                                class='form-control @error("translations.$lng.name") _incorrectly @enderror'
                                id="name_{{$lng}}" name="translations[{{$lng}}][name]"
                                value='{{ $template->translate($lng)->name }}'>
                            @error("translations.$lng.name")
                            <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        @endforeach

                        <div class="col-12">
                            <label for="route" class="form-label">Маршрут </label>
                            <input type="text"
                                class='form-control @error("route") _incorrectly @enderror'
                                id="route" name="route"
                                value='{{ $template->route }}'>
                            @error("route")
                                <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="image" class="form-label">Изображение</label>
                            <input type="file" class="form-control" id="image" name="image_path" accept="image/png, image/jpeg, image/jpg, image/PNG, image/JPG">
                            @error('items')
                                <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="images_div d-flex flex-wrap justify-content-between w-25">
                            @if ($template->image_path)
                                <img src="{{url('') . Storage::disk('local')->url($template->image_path)}}">
                            @endif
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
