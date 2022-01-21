@extends('adminlte::page')

@section('title', 'Visions')

@section('content_header')
<div class="container-fluid d-flex justify-content-between">
    <h1>Visions</h1>
    <a href="{{ route('admin.vision.create') }}" class="btn btn-outline-primary">
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
                <th>Title</th>
                <th>Position</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visions as $vision)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$vision->title}}</td>
                <td>{{$vision->position}}</td>
                <td>{!! str_limit($vision->description,100) !!}</td>
                <td>
                    {{--                        <a href="{{route('admin.team.show', $team->id)}}">--}}
                    {{--                            <i class="fa fa-eye mr-2 text-info"></i>--}}
                    {{--                        </a>--}}
                    <a href="{{route('admin.vision.edit', $vision->id)}}">
                        <i class="fa fa-edit mr-2"></i>
                    </a>
                    <a href="{{route('admin.vision.destroy', $vision->id)}}" class="delete-confirm">
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />
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
</script>

@include('sweetalert::alert')

<script>
    $(document).ready(function () {
            $('#table_id').DataTable();
        });
</script>
@stop
