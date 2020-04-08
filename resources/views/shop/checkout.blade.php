@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6 offset-3 mt-4">
        <h1>Checkout</h1>
        <h4>Totaalbedrag: {{ $total }} euro</h4>
        <form action="{{ route('product.cart.pay') }}" method="POST" id="checkout-form">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                    </div>
                    @error('name')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('name') }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="street">Straat</label>
                        <input type="text" id="street" name="street" class="form-control @error('street') is-invalid @enderror">
                    </div>
                    @error('street')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('street') }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="postalcode">Postcode</label>
                        <input type="text" id="postalcode" name="postalcode" class="form-control @error('postalcode') is-invalid @enderror">
                    </div>
                    @error('postalcode')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('postalcode') }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="city">Stad</label>
                        <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror">
                    </div>
                    @error('city')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('city') }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="country">Land</label>
                        <input type="text" id="country" name="country" class="form-control @error('country') is-invalid @enderror">
                    </div>
                    @error('country')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('country') }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="card-name">Naam van kaarthouder</label>
                        <input type="text" id="card-name" class="form-control @error('card-name') is-invalid @enderror">
                    </div>
                    @error('card-name')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('card-name') }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="card-number">Credit Card nummer</label>
                        <input type="text" id="card-number" class="form-control @error('card-number') is-invalid @enderror">
                    </div>
                    @error('card-number')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('card-number') }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="card-expiry-month">Verloopmaand</label>
                                <input type="text" id="card-expiry-month" class="form-control @error('card-expiry-month') is-invalid @enderror">
                            </div>
                            @error('card-expiry-month')
                            <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('card-expiry-month') }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="card-expiry-year">Verloopjaar</label>
                                <input type="number" value="2000" min="2000" max="2030" id="card-expiry-year" class="form-control @error('card-expiry-year') is-invalid @enderror">
                            </div>
                            @error('card-expiry-year')
                            <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('card-expiry-year') }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="card-cvc">CVC</label>
                        <input type="text" id="card-cvc" class="form-control @error('card-cvc') is-invalid @enderror">
                    </div>
                    @error('card-cvc')
                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $errors->first('card-cvc') }}</div>
                    @enderror
                </div>
            </div>
            @csrf
            <button type="submit" class="btn btn-success">Kopen</button>
        </form>
    </div>
</div>
@endsection
