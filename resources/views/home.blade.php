@extends('layouts.auth-app')

@section('content')
<div class="pagetitle">
    <h1>Дашборд </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Тарифы</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-file-list-2-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{tariffs()->count()}}</h6>
                            <a href="{{ route('tariff.index')}}}">Перейти на страницу тарифов</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Категории</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-file-list-2-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{categories()->count()}}</h6>
                            <a href="{{ route('category.index')}}">Перейти на страницу категории</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Шаблоны</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bx bx-news"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{templates()->count()}}</h6>
                            <a href="{{ route('template.index')}}">Перейдите на страницу шаблоны</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection
