@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">Factureringen</div>
                    <div class="card-body">
                        <div class="alert alert-success">Filter:
                            <a href="#" id="filterPaymentDoneBtn" class="btn btn-success d-inline-block">Voldaan</a>
                            <a href="#" id="filterPaymentPendingBtn" class="btn btn-danger d-inline-block">Niet voldaan</a>
                            <a href="#" id="filterPaymentNoneBtn" class="btn btn-secondary d-inline-block">Geen</a>
                        </div>
                        <div id="orderContent">
                            @foreach($orders as $order)
                                <div class="accordion" id="accordion_{{$order->id}}">
                                    <div class="card">
                                        <div class="card-header orderHeading" id="orderHeading">
                                            <h2 class="mb-0">
                                                <button class="btn d-inline-block" type="button" data-toggle="collapse" data-target="#collapse_{{$order->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                    <strong>Bestellingnummer: {{ $order->id }}</strong>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapse_{{$order->id}}" class="collapse" aria-labelledby="orderHeading" data-parent="#accordion_{{$order->id}}">
                                            <div class="card-body">
                                                @if($order->order_detail->payment === 0)
                                                <form action="{{ route('order.admin.update', $order->order_detail->id) }}"  class="float-right" method="POST">
                                                    @csrf
                                                    <input type="submit" class="btn btn-danger payment-button" value="Betaling voldaan">
                                                </form>
                                                @endif
                                                <ul>
                                                    @foreach($order->order_product as $order_product)
                                                        <li><a href=" {{ route('product.show', $order_product->product_id) }}">{{ $order_product->product->title }}</a> {{ $order_product->qty }} stuks van {{$order_product->product->price}} euro.</li>
                                                    @endforeach
                                                </ul>
                                                <hr>
                                                <p>Totaalbedrag: <strong>{{ $order->order_detail->totalPrice }} euro </strong></p>
                                                <p class="personal">
                                                    <span  class="d-block name"><strong>Naam: </strong> {{ $order->user->name }}</span>
                                                    <span class="d-block email"><strong>Email: </strong> {{ $order->user->email }} </span>
                                                </p>
                                                <p class="address">
                                                    <strong>Adres:</strong>
                                                    {{$order->order_detail->street}}
                                                    {{$order->order_detail->postalcode}}
                                                    {{$order->order_detail->city}}
                                                </p>
                                                <p>Betaling: <i>@if($order->order_detail->payment === 1) voldaan @else niet voldaan @endif</i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
