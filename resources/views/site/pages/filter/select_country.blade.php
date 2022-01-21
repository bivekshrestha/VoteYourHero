@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('content')
    <div class="container-fluid tb_spacing">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 mt-5 mt-md-1 mb-2">
                <input class="form-control" id="myInput" type="text" placeholder="Search Country">
            </div>
        </div>

        <div class="row p-2 p-md-5" id="filter">
            @foreach($countries as $country)
                <div class="col-6 col-md-2 text-center mb-3">
                    <form method="get" action="{{ route('filter.result') }}" class="h-100">
                        <input type="hidden" name="country[]" value="{{$country->id}}">
                        <button type="submit" class="btn btn-light border-0 p-0 pb-2  h-100">
                            <img class="country-card-flag mb-2"
                                 src="{{ asset('images/flags/Flag of ' . $country->name . '.gif') }}"
                                 alt="{{ $country->name }}">
                            <span class="font-weight-bold">{{$country->name}}</span>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                let value = $(this).val().toLowerCase();
                $("#filter div").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@stop
