@extends('template')
@section('content')
<html>
<html>
    <h1>liste des produits</h1>
    <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Liste Produit </h6>
                    </div>
    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">id</th>
                                    <th scope="col">libelle</th>
                                    <th scope="col">prix</th>
                                    <th scope="col">quantite</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">categorie</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{($article->id)}}</td>
                                    <td>{{($article->libelle)}}</td>
                                    <td>{{($article->prix)}}</td>
                                    <td>{{($article->quantite)}}</td>
                                    <td><img src="/img/{{$article->image}}" width="96" height="96"/></td>
                                    <td>{{($article->nom)}}</td>
                                    <td>
                                    <p>
                                    <form action="{{route('articles.destroy',($article->id))}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-sm btn-primary" size ="100" style="font-size: 10px" >delete</button>
                                    </form>
                                    <!-- -->
                                    <form action="{{route('articles.edit',($article->id))}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <button type="submit" class="btn btn-sm btn-primary" style="font-size: 10px">edit</button>
                                    </form>
                                    </p>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                        </div>
                </div>
                                

                  
            
        </table>
    </html>

@endsection