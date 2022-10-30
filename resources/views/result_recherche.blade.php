@extends('template')
@section('content')
<html>
<html>
    <h1>produit trouve</h1>
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

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{($article->id)}}</td>
                                    <td>{{($article->libelle)}}</td>
                                    <td>{{($article->prix)}}</td>
                                    <td>{{($article->quantite)}}</td>
                                    <td><img src="/img/{{$article->image}}" width="96" height="96"/></td>
                                    
                                </tr>
                             
                                </tbody>
                        </table>
                        </div>
                </div>
        @endsection