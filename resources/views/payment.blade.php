@php
$cart_array=cardArray();					
@endphp
@extends('template_heritage_client')
@section('content')
<!-- Order Details -->
<div class="section">
<div class="container">
<div class="row">
<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							@foreach ($cart_array as $cart)
							<div class="order-products">
								<div class="order-col">
									<div>{{$cart['quantity']}}x {{$cart['name']}}</div>
									<div>{{Cart::get($cart['id'])->getPriceSum()}}</div>
								</div>
							
							</div>
							@endforeach
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">{{Cart::getTotal()}}</strong></div>
							</div>
						</div>
						<form action="{{url('/place_order')}}" method="POST">
						@csrf
						<h4 class="title" style="color:#D10024;">please select a payment methode</h4>

						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1" value="cash">
								<label for="payment-1">
									<span></span>
									Pay on delivery
								</label>
								<div class="caption">
									<p>You can also select cash on delivery</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2" value="Bank kash">
								<label for="payment-2">
									<span></span>
									Bkash
								</label>
								<div class="caption">
									<p>Bkash No:01308983894</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3" value="paypal">
								<label for="payment-3">
									<span></span>
									Paypal System<a href="#" onClick="alert('Hello World!')"><h7 class="title" style="color:#D10024;">non disponibel</h7>
								</label>
								<div class="caption">
									<p>This System is invalid</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<input type="submit" class="primary-btn order-submit" value="place_order"></a>
					</form>
					</div>
					<!-- /Order Details -->
</div>
</div>
</div>
                    @endsection