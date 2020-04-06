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
                                <a href="#" class="btn btn-success">In winkelwagen</a>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Meer</a>
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
