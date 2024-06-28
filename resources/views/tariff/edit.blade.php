@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="pagetitle">
    <h1>Тарифы</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('tariff.index')}}">Тарифы</a></li>
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

                    <form class="row g-3" action="{{route('tariff.update', $tariff->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12">
                            <label for="price" class="form-label">Цена</label>
                            <input type="text"
                                class='form-control @error("price") _incorrectly @enderror'
                                id="price" name="price"
                                value='{{ $tariff->price}}'>
                            @error("price")
                                <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="month" class="form-label">Месяц</label>
                            <input type="text"
                                class='form-control @error("month") _incorrectly @enderror'
                                id="month" name="month"
                                value='{{ $tariff->month}}'>
                            @error("month")
                                <div class="error_message"> {{ $message }} </div>
                            @enderror
                        </div>


                        @foreach (languages() as $key => $lng)
                        <div class="col-12  my-4">
                            {{ Str::upper($lng)}}
                            <hr style="border: 1px solid; margin-top: 0">
                            <div class="col-12 my-2">
                                <label for="name_{{$lng}}" class="form-label">Имя </label>
                                <input type="text"
                                    class='form-control @error("translations.$lng.name") _incorrectly @enderror'
                                    id="name_{{$lng}}" name="translations[{{$lng}}][name]"
                                    value='{{ $tariff->translate($lng)->name }}'>
                                @error("translations.$lng.name")
                                <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="col-12 my-2">
                                    <label for="desc_{{$lng}}" class="form-label">Описание </label>
                                    <input type="text"
                                        class='form-control @error("translations.$lng.desc") _incorrectly @enderror'
                                        id="desc_{{$lng}}" name="translations[{{$lng}}][desc]"
                                        value='{{ $tariff->translate($lng)->desc }}'>
                                    @error("translations.$lng.desc")
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>

                             <div class="col-12 my-2">
                                    <label for="info_title_{{$lng}}" class="form-label">Описание </label>
                                    <input type="text"
                                        class='form-control @error("translations.$lng.info_title") _incorrectly @enderror'
                                        id="info_title_{{$lng}}" name="translations[{{$lng}}][info_title]"
                                        value='{{ $tariff->translate($lng)->info_title }}'>
                                    @error("translations.$lng.info_title")
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>

                             <div class="col-12 my-2">
                                    <label for="info_text_{{$lng}}" class="form-label">Описание </label>
                                    <input type="text"
                                        class='form-control @error("translations.$lng.info_text") _incorrectly @enderror'
                                        id="info_text_{{$lng}}" name="translations[{{$lng}}][info_text]"
                                        value='{{ $tariff->translate($lng)->info_text }}'>
                                    @error("translations.$lng.info_text")
                                    <div class="error_message"> {{ $message }} </div>
                                @enderror
                            </div>

                            <div class="col-12 my-2">
                                    <label for="info_text_{{$lng}}" class="form-label">Информация </label>

                                @foreach (json_decode($tariff->translate($lng)->info_items) as $k => $item)
                                    <input type="text"
                                        class='form-control my-2 @error("translations.$lng.info_text") _incorrectly @enderror'
                                        id="info_text_{{$lng}}" name=""
                                        value='{{ $item }}'>
                                    @error("translations.$lng.info_text")
                                    <div class="error_message"> {{ $message }} </div>
                                     @enderror
                                @endforeach


                            </div>
                        </div>

                        @endforeach


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
