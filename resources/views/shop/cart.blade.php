@extends('layouts.app')

@section('content')
        @if(Session::has('cart') && Session::get('cart')->totalQty > 0)
            <div class="row">
                <div class="col-6 offset-3 mt-4">
                    <h5 align="center">Winkelwagen</h5>
                    <ul class="list-group">
                        <div class="accordion" id="accordionExample">
                        @foreach($products as $key => $product)
                                <li class="list-group-item">
                                    <div class="card">
                                        <div class="card-header" id="product_{{ $productNr }}">
                                            <h2 class="mb-0">
                                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse_{{ $productNr }}" aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="badge badge-secondary"> {{ $product['qty'] }} </span>
                                                    <strong> {{ $product['product']['title'] }} </strong>
                                                </button>
                                                <form action="{{ route('product.cart.edit') }}" method="POST" class="d-inline-block float-right">
                                                    @csrf
                                                    <input type="hidden" name="amount" id="amount" value="0">
                                                    <input type="hidden" name="product_id" id="product_id" value="{{$key}}">
                                                    <input type="submit" class="btn btn-danger d-inline-block ml-4 cart--remove" value="&times;">
                                                </form>
                                                <p class="cart--price d-inline-block float-right"><i>Prijs: </i><span class="badge badge-success"> {{ $product['price'] }}</span></p>

                                            </h2>
                                        </div>

                                        <div id="collapse_{{ $productNr }}" class="collapse" aria-labelledby="product_{{ $productNr }}" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ route('product.cart.edit') }}" method="POST">
                                                @csrf
                                                    <label for="amount">Wijzig aantal: </label>
                                                    <input type="hidden" name="product_id" id="product_id" value="{{$key}}">
                                                    <input type="number" name="amount" id="amount" min="0" value="{{ $product['qty'] }}" class="form-control col-2 d-inline-block">
                                                    <input type="submit" value="Bevestigen" class="d-inline-block btn btn-success cart__form--changeAmountBtn">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php $productNr++ ?>
                        @endforeach
                        </div>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-3 mt-4">
                    <strong>Totaal: &euro; {{ $totalPrice }}</strong>
                </div>
            </div>
            <hr class="col-6">
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="{{ route('product.cart.checkout') }}" type="button" class="btn btn-success">Betalen</a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-6 offset-3 mt-4" align="center">
                    <h2>Uw winkelwagen is leeg.</h2>
                </div>
            </div>
        @endif
@endsection
