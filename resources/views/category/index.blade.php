@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Категории</h1>
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                <li class="breadcrumb-item active">Категории</li>

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
            <div class="d-flex justify-content-end mb-3">

                <a href="{{ route('category.create') }}"><button type="button" class="btn btn-primary">Создать категорию</button></a>
            </div>

            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Название</th>
                        <th >Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ctegories as $category)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>
                           {{ $category->translation->name}}
                        </td>

                        <td class="px-1" style="width: 100px">
                            <div class="d-flex justify-content-between align-item-center px-2 action" data-id="{{ $category->id }}" data-tb-name="categories">
                                <div>
                                    <a href="{{ route('category.edit', $category->id) }}" class="ml-2">
                                        <i class="bi bi-pencil-square action_i" style="font-size: 24px"></i>
                                    </a>
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
                {{ $ctegories->links() }}
            </ul>
        </nav>
    </div>

@endsection
<x-modal-delete></x-modal-delete>


@section('js-scripts')
    <script src="{{ asset('assets/js/delete-item.js') }}"></script>
@endsection
