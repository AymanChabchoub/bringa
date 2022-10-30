@php
$cart_array=cardArray();					
@endphp
@extends('template_heritage_client')
@section('content')
<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<form action="{{('/shiping')}}" method="POST">
							@csrf
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Full Name">
							</div>
							
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="pays" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="villes" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>
							
							<input type="submit" value="Ajouter" class="btn btn-sm btn-primary"name="B1">
							</form>	
						</div>
						<!-- /Billing Details -->
					</div>

					<!-- Order Details -->
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
						
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		@endsection