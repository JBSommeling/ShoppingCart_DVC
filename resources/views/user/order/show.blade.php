@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">Mijn bestellingen</div>
                    <div class="card-body">
                        @foreach($orders as $order)
                            <div class="accordion" id="accordion_{{$order->id}}">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapse_{{$order->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                Bestellingnummer: {{ $order->id }}
                                                {{ $order->created_at }}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse_{{$order->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_{{$order->id}}">
                                        <div class="card-body">

                                            @foreach($order->order_product as $order_product)
                                                {{ $order_product->product->title }} <br>
                                            @endforeach
                                           {{$order->order_detail->street}}
                                            {{$order->order_detail->created_at}}
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
@endsection
