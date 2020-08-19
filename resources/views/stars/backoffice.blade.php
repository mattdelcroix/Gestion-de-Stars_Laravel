@extends('template')

@section('title')
    | Modifier une star
@stop

@section('content')
    <div class="jumbotron">
    <h1 class="display-4">Backoffice des stars</h1>
    <p class="lead">Bienvenue sur le backoffice des stars. Ici, vous pourrez : créer des fiches, les modifier et les supprimer !</p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="/star/create" role="button">Créer une star</a>
    <a class="btn btn-primary btn-lg" href="/star/gestion" role="button">Gestion des stars</a>
    </div>
@stop