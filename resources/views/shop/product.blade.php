@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('components.sidebar')
        <div id="content">
            <button type="button" id="sidebarCollapse" class="sticky-button btn btn-success mt-4 ml-4">
                <i class="fas fa-align-left"></i>
            </button>
            @include('components.searchbar')
            <div class="container-fluid" id="productContent">
                            <div class=" col-6 offset-3" align="center">
                                <div class="card product__detail">
                                    <img class="card-img-top product__detail--img-top" src="{{ $product['imagePath'] }}" alt="Card image cap">
                                    <div class="card-body product__detail--body">
                                        <h5 class="card-title product__detail--title"> {{ $product['title'] }} </h5>
                                        <p class="card-text product__detail--card-text"> {{$product['description']}}</p>
                                        <h5 class="product__detail--price text-danger"> &euro; {{ $product['price'] }}</h5>
                                        <form action="{{ route('product.addToCart') }}" method="POST">
                                            <div class="form-group">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="product_id" id="product_id">
                                                <input type="number" name="amount" min="0" value="1" id="amount" class="form-control w-25 d-inline-block">
                                                <input type="submit" class="btn btn-success ml-4 product__detail--toCartBtn" id="toCartBtn" value="In winkelwagen.">
                                            </div>
                                        </form>
{{--                                        <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-success">In winkelwagen</a>--}}
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
@endsection
