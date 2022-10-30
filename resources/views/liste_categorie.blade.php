@extends('template')
@section('content')
<html>
<html>
    <h1>liste des categories</h1>
    <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Liste categories </h6>
                    </div>
    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">id</th>
                                    <th scope="col">nom</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>{{($categorie->id)}}</td>
                                    <td>{{($categorie->nom)}}</td>
                                 
                                    <td>
                                    <form action="{{route('categories.destroy',($categorie->id))}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-primary" >delete</button></form>
                                    <!-- -->
                                    <form action="{{route('categories.edit',($categorie->id))}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <button type="submit" class="btn btn-sm btn-primary">edit</button></form>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                        </div>
                </div>
                                
            
    </html>

@endsection