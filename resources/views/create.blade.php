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
<form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
@csrf

                            <thead>
                                <tr class="text-white">
                                    
                                    <th scope="col">libelle</th>
                                    <th scope="col">prix</th>
                                    <th scope="col">quantite</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">categorie</th>
                                </tr>
                            </thead>
							<tbody>
                                <tr>
								<td height="50" width="200"><input type="text" name="libelle" size="25" ></td>
								<td height="31" width="200"><input type="text" name="prix" size="20"></td>
								<td height="31" width="200"><input type="text" name="quantite" size="20"></td>
								<td height="31" width="200"><input type="file" name="image" size="20"></td>
                                <td><select size="1" name="categorie_id">
	                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">    nom:{{$categorie->nom}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
							</tbody>
							
							<p><input type="submit" value="Ajouter" class="btn btn-sm btn-primary"name="B1"></p>
</form>
</table>
</div>
</div>
							




</body>

</html>
@endsection
