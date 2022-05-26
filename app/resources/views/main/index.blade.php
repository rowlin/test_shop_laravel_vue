@extends('layouts.app')


@section('content')
    <div class="row mb-3">
        <img src="{{ url('img/banner.png') }}" alt="Banner">
    </div>
        <shop-list-component></shop-list-component>
    </div>
@endsection
