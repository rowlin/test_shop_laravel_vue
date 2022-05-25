@extends('layouts.app')


@section('content')
    <div class="row mb-3">
        <img src="{{ url('img/banner.png') }}" alt="Banner">
    </div>
        <shop-list-component :products='{!!  json_encode($products->toArray()['data']) !!}'></shop-list-component>

    <div>
        {{ $products->links() }}
    </div>
    </div>
@endsection
