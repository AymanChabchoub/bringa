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
                        <h6 class="mb-0">Ajouter un categorie </h6>
                    </div>
<div class="table-responsive">
	
<table class="table text-start align-middle table-bordered table-hover mb-0">
<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
@csrf

                            <thead>
                                <tr class="text-white">
                                    
                                    <th scope="col">nom</th>
                                    <th scope="col">is_online</th>
                                    
                                </tr>
                            </thead>
							<tbody>
                                <tr>
								<td height="31" width="272"><input type="text" name="nom" size="25" ></td>
							
								<td height="31" width="280"><p><select size="1" name="is_online"><option>1</option><option>0</option><option selected value=1>default</option></select></p></td>
                                <td height="31" width="200"><input type="file" name="image" size="20"></td>

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
