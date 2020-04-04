@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('layouts.sidebar')
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn btn-success mt-4 ml-4">
            <i class="fas fa-align-left"></i>
        </button>
        <div class="container-fluid">
            @foreach($products->chunk(5) as $productChunk)
                <div class="row">
                    @foreach($productChunk as $product)
                    <div class=" col-12 col-sm-6 col-lg-4 mb-4" align="center">
                        <div class="card">
                            <img class="card-img-top" src="{{ $product['imagePath'] }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $product['title'] }} </h5>
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
