@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to heroes journey to Everest.</p>
@stop

@section('js')
    @include('sweetalert::alert')
@stop
