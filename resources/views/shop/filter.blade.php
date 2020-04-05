@foreach($products->chunk(5) as $productChunk)
    <div class="row">
        @foreach($productChunk as $product)
            <div class=" col-12 col-sm-6 col-lg-4 mb-4" align="center">
                <div class="card product">
                    <img class="card-img-top product-img-top" src="{{ $product->imagePath }}" alt="Card image cap">
                    <div class="card-body product-body">
                        <h5 class="card-title product-title"> {{ $product->title }} </h5>
                        <a href="#" class="btn btn-success">In winkelwagen</a>
                        <a href="#" class="btn btn-secondary">Meer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
