@extends('template')
@section('content')
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
				<div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Séléctionner une date </h6>
                    </div>
<div class="table-responsive">
	
<table class="table text-start align-middle table-bordered table-hover mb-0" >
<form method="POST" action="{{url('/result_article_date')}}">
    @csrf
<thead><tr class="text-white"><th scope="col">date:</th></tr></thead>
	<tbody><tr><td><p>Entrer la date:<input type="date" name="date" size="20"></p></tbody></tr></tr>
	<p><input type="submit" value="Submit" name="B1"></p>
</form>
</table>
</div>
</div>
@endsection