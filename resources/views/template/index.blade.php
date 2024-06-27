@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Шаблон</h1>
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                <li class="breadcrumb-item active">Шаблон</li>

            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">

                <a href="{{ route('template.create') }}"><button type="button" class="btn btn-primary">Создать шаблон</button></a>
            </div>

            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Название</th>
                        <th >Изображение</th>
                        <th style="width: 80px !important">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>
                           {{ $template->translation->name}}
                        </td>
                        <td class="w-25">
                           <img src="{{ Storage::disk('local')->url($template->image_path)}}" class="w-25">
                        </td>

                        <td class="px-1" style="width: 160px">
                            <div class="d-flex justify-content-between align-item-center px-2 action" data-id="{{ $template->id }}" data-tb-name="templates">
                                <div>
                                    <a href="{{route('template.edit', $template->id)}}" class="ml-2">
                                        <i class="bi bi-pencil-square action_i" style="font-size: 24px"></i>
                                    </a>
                                </div>
                                <div class="form-check  form-switch ">
                                    <input class="form-check-input change_status" type="checkbox"
                                        role="switch" data-field-name="status"
                                        {{ $template->status ? 'checked' : null }}>
                                </div>
                                <div>
                                    <button type="button" class="dropdown-item click_delete_item text-primary"
                                        data-bs-toggle="modal" data-bs-target="#smallModal"><i
                                        class="bi bi-trash  action_i mr-2" style="font-size: 22px"></i>
                                    </button>
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
                {{ $templates->links() }}
            </ul>
        </nav>
    </div>

@endsection

<x-modal-delete></x-modal-delete>

@section('js-scripts')
     <script src="{{ asset('assets/js/change-status.js') }}"></script>
    <script src="{{ asset('assets/js/delete-item.js') }}"></script>
@endsection
