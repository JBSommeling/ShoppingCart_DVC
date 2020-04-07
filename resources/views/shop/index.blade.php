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
            @foreach($products->chunk(5) as $productChunk)
                <div class="row">
                    @foreach($productChunk as $product)
                    <div class=" col-12 col-sm-6 col-lg-4 mb-4" align="center">
                        <div class="card product">
                            <img class="card-img-top product--img-top" src="{{ $product['imagePath'] }}" alt="Card image cap">
                            <div class="card-body product--body">
                                <p class="badge badge-success"> &euro; {{ $product->price }}</p>
                                <h5 class="card-title product--title"> {{ $product['title'] }} </h5>
                                <form action="{{ route('product.addToCart') }}" method="POST">
                                    <div class="form-group">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id" id="product_id">
                                        <input type="hidden" name="amount" min="0" value="1" id="amount" class="form-control w-25 d-inline-block">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" id="toCartBtn" value="In winkelwagen.">
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Meer</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
