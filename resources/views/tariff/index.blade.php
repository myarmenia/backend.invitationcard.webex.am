@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Тарифы</h1>
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                <li class="breadcrumb-item active">Тарифы</li>

            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    @if ($message = Session::get('error'))
        <div class="alert alert-success my-2">
            <p>{{__('messages.error')}}</p>
        </div>
    @endif

    <div class="card pt-4">
        <div class="card-body">

            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Название</th>
                        <th >Цена</th>
                        <th  style="width: 80px !important">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tariffs as $tariff)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>
                           {{ $tariff->translation->name}}
                        </td>
                        <td>
                           {{ $tariff->price}}
                        </td>

                        <td class="px-1" style="width: 100px">
                            <div class="d-flex justify-content-between align-item-center px-2 action" data-id="{{ $tariff->id }}" data-tb-name="tariffs">
                                <div>
                                    <a href="{{ route('tariff.edit', $tariff->id) }}" class="ml-2">
                                        <i class="bi bi-pencil-square action_i" style="font-size: 24px"></i>
                                    </a>
                                </div>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Primary Color Bordered Table -->
        </div>
    </div>

    <div class="card-body d-flex justify-content-center">
        <nav aria-label="...">
            <ul class="pagination">
                {{ $tariffs->links() }}
            </ul>
        </nav>
    </div>

@endsection
<x-modal-delete></x-modal-delete>


@section('js-scripts')
    <script src="{{ asset('assets/js/delete-item.js') }}"></script>
@endsection
