@extends('template')
@section('content')
<body>
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
				<div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ajouter ID article a chercher </h6>
                    </div>
<div class="table-responsive">
	
<table class="table text-start align-middle table-bordered table-hover mb-0">
<form method="get" action="/recherche" enctype="multipart/form-data">
	@csrf
	<p>ID_ARTICLE:<input type="text" name="id" size="100"style="background-color: #666666"></p>
	<p><input type="submit" value="chercher" class="btn btn-sm btn-primary" name="B1"></p>
</form>
</form>
</table>
</div>
</div>
@endsection