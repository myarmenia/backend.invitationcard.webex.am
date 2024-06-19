@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Template</h1>
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Template</li>

            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">

                <a href="{{ route('template.create') }}"><button type="button" class="btn btn-primary">Create template</button></a>
            </div>

            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Name</th>
                        <th  style="width: 80px !important">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>
                           {{ $template->name}}
                        </td>

                        <td class="px-1">
                            <div class="d-flex justify-content-between">
                                <a href="{{route('template.edit', $template->id)}}">
                                    <i class="bi bi-pencil-square action_i"></i>
                                </a>
                                {{-- <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"  onclick="create_request_route(`templates`, {{$template->id}})"></i>
                                <a href="{{ $template->status != 1 ? route('change_status', [$template->id, 'templates', 1]) : ''}}">
                                    <i class="bi bi-check-circle action_i" style="color:{{ $template->status == 1 ? '#0d6efd' : ''}}" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="{{ $template->status == 1 ? 'Confirmed' : 'Change status to confirmed'}}"> </i>
                                </a> --}}
                                <a class="dropdown-item d-flex" href="javascript:void(0);">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input change_status" type="checkbox"
                                            role="switch" data-field-name="status"
                                            {{ $template->status ? 'checked' : null }}>
                                    </div>
                                </a>

                                <button type="button" class="dropdown-item click_delete_item"
                                    data-bs-toggle="modal" data-bs-target="#smallModal"><i
                                    class="bx bx-trash me-1"></i>
                                </button>
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

    @extends('layouts.modal')
@endsection

<x-modal-delete></x-modal-delete>

@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
