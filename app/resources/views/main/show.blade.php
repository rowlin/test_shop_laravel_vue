@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-center pt-1 mb-3" style="background-color: #999999 ; ">
     <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-bottom: 0.5rem;">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" style="color: #fff;" aria-current="page" >{{ $product->name }}</li>
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
                <div class="mb-3">
                <h1>{{ $product->name }}</h1>
                @if($product->price_with_discount != 0)
                    <del>{{ $product->price }}</del>
                    <span>{{ $product->price_with_discount }}</span>
                @else
                    <span>{{ $product->price }}</span>
                @endif
                </div>
                <hr/>
                <div>
                    {{ $product->description }}
                </div>

                <ul class="mt-2" style="list-style: none; padding-left: 10px;">
                @foreach($product->options as $option)
                        <li> <span class="m-2">✔</span> {{ $option->name }}</li>
                @endforeach
                </ul>

                <add-to-cart product="{{ $product->id }}"  max="{{ $product->available_count }}"></add-to-cart>

                <div class="mt-4">
                    <span>SKU : {{ $product->code }}</span>
                </div>
                <print-list name="Categories" :data="{{ $product->categories }}" ></print-list>
                <print-list name="Tags" :data="{{ $product->tags }}"></print-list>
            </div>

                <div class="d-flex align-items-start m-2" style="padding-top: 60px; padding-bottom: 60px; ">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Description</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Reviews(1)</button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">{{ $product->description }}</div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                    </div>
                </div>
            </div>

    </div>

    </div>
@endsection
<script>
    import AddToCart from "../../js/components/AddToCart";
    import PrintList from "../../js/components/PrintList";
    import Slider from "../../js/components/Slider";
    export default {
        components: {Slider, PrintList, AddToCart}
    }
</script>
<style scoped>
    .breadcrumb > li > a{
        color:#ffffff;
    }

    .nav-link{
        background-color: #fff;
        color: #1a202c;
    }

</style>
