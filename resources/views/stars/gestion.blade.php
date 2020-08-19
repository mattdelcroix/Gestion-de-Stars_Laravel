@extends('template')

@section('title')
    | Gestion des stars
@stop

@section('content')

    <h1 class="bd-title m-5" id="content">Tableau de gestion des stars</h1>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stars as $star)
            <tr>
            <td>{{ $star->nom }}</td>
            <td>{{ $star->prenom }}</td>
            <td>
                <a class="btn btn-warning btn-lg" href="/star/{{ $star->id }}/edit" role="button">Modifier</a>
                <a class="btn btn-danger btn-lg" href="/star/{{ $star->id }}/delete" role="button" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette star?');">Supprimer</a>
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>
@stop