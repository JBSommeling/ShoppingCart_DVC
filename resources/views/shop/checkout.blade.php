@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6 offset-3 mt-4">
        <h1>Checkout</h1>
        <h4>Totaalbedrag: {{ $total }} euro</h4>
        <form action="{{ route('product.cart.pay') }}" method="POST" id="checkout-form">
            <div class="row">
                <div class="col-12">
                @foreach($fields as $key => $field)
                        <div class="form-group">
                            <label for="{{ $key }}">{{ $field }}</label>
                            <input type="text" value="{{ old($key) }}" id="{{ $key }}" name=" {{ $key }}" class="form-control @error($key) is-invalid @enderror">
                        </div>
                        @error($key)
                            <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first($key) }}</div>
                        @enderror
                    @endforeach
                </div>
            </div>
            @csrf
            <button type="submit" class="btn btn-success">Kopen</button>
        </form>
    </div>
</div>
@endsection
