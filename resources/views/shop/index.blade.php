@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('layouts.sidebar')
    <div id="content">
        <button type="button" id="sidebarCollapse" class="btn btn-success mt-4 ml-4">
            <i class="fas fa-align-left"></i>
        </button>
        <div class="container-fluid">
            @foreach($products->chunk(3) as $productChunk)
                <div class="row mb-4">
                    @foreach($productChunk as $product)
                    <div class="col-4" align="center">
                        <div class="card"  style="width: 18rem;">
                            <img src="{{ $product['imagePath'] }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
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
