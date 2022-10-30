@extends('template')
@section('content')
<html>

<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>
</head>

<body>
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
				<div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ajouter un article </h6>
                    </div>
<div class="table-responsive">
	
<table class="table text-start align-middle table-bordered table-hover mb-0">
<form method="POST" action="{{route('articles.update',($article->id))}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="$article->id">
                            <thead>
                                <tr class="text-white">
                                    
                                    <th scope="col">libelle</th>
                                    <th scope="col">prix</th>
                                    <th scope="col">quantite</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
							<tbody>
                                <tr>
								<td height="31" width="272"><input type="text" name="libelle" value="{{$article->libelle}}"size="25" ></td>
								<td height="31" width="284"><input type="text" name="prix" value="{{$article->prix}}" size="25"></td>
								<td height="31" width="269"><input type="text" name="quantite" value="{{$article->quantite}}" size="25"></td>
								<td height="31" width="280"><input type="file" name="image"><img src="/img/{{$article->image}}" width="250" height="100"/></td>
							</tr>
							</tbody>
							
							<p><input type="submit" value="Editer" class="btn btn-sm btn-primary"name="B1"></p>
</form>
</table>
</div>
</div>
							




</body>

</html>
@endsection
