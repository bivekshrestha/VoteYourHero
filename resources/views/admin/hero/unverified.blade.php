@extends('adminlte::page')

@section('title', 'Heroes')

@section('content_header')
    <div class="container-fluid d-flex justify-content-between">
        <h1>Heroes</h1>
        <a href="{{ route('admin.hero.create') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus-circle"></i>
            Add New
        </a>
    </div>
@stop

@section('content')

    <div class="container-fluid">
        <table id="table_id" class="display" width="100%">
            <thead>
            <tr>
                <th width="5%">S.N.</th>
                <th>Full Name</th>
                <th>Country</th>
                <th>Profession</th>
                <th>Company/Category</th>
                <th>Verification</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($heroes as $hero)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{ $hero->first_name }}@if($hero->middle_name )&nbsp{{ $hero->middle_name }}@endif
                        &nbsp{{ $hero->last_name }}
                    </td>
                    <td>{{$hero->country->name}}</td>
                    <td>{{str_limit($hero->profession, 10)}}</td>
                    <td>{{str_limit($hero->identity, 20)}}</td>
                    <td>
                        <a
                            href="{{route('admin.hero.verify', $hero->id)}}"
                            class="verify-confirm btn btn-outline-success btn-sm"
                        >
                            Verify Hero
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.hero.show', $hero->id)}}">
                            <i class="fa fa-eye mr-2 text-info"></i>
                        </a>
                        <a href="{{route('admin.hero.edit', $hero->id)}}">
                            <i class="fa fa-edit mr-2"></i>
                        </a>
                        <a href="{{route('admin.hero.destroy', $hero->id)}}" class="delete-confirm">
                            <i class="fa fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <style>
        div.dataTables_wrapper div.dataTables_length select {
            width: 40% !important;
        }
    </style>
@stop

@section('js')
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanently deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

        $('.verify-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: 'Once a hero is verified, ot will be available for voting.',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>

    @include('sweetalert::alert')

    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>
@stop

