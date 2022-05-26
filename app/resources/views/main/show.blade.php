@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-center pt-1">
     <nav aria-label="breadcrumb " >
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="#">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
     </nav>
    </div>


        <div class="container">
            <div class="row">
            <div class="col-5">
                <slider :images="{{ $product->images }}">
                </slider>
            </div>
            <div class="col-7">



            </div>


        </div>



    </div>

    </div>
@endsection
