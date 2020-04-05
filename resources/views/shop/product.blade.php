@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('layouts.sidebar')
        <div id="content">
            <button type="button" id="sidebarCollapse" class="sticky-button btn btn-success mt-4 ml-4">
                <i class="fas fa-align-left"></i>
            </button>
            <div class="container-fluid" id="productContent">
                            <div class=" col-6 offset-3" align="center">
                                <div class="card product__detail">
                                    <img class="card-img-top product__detail--img-top" src="{{ $product['imagePath'] }}" alt="Card image cap">
                                    <div class="card-body product__detail--body">
                                        <h5 class="card-title product__detail--title"> {{ $product['title'] }} </h5>
                                        <p class="card-text product__detail--card-text"> {{$product['description']}}</p>
                                        <h5 class="product__detail--price text-danger"> &euro; {{ $product['price'] }}</p>
                                        <a href="#" class="btn btn-success">In winkelwagen</a>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
@endsection
