@extends('template')

@section('title')
    | Modifier une star
@stop

@section('content')
    <h1 class="bd-title m-5" id="content">Formulaire de modification de star</h1>

    <form method="POST" action="/star/{{ $star->id }}" enctype="multipart/form-data">
    
    <!-- Utilisation de la méthode "PUT" pour la modification des données -->
    @method('PUT')
    
    <!-- Protection contre les attaques "cross-site request forgery" --> 
    @csrf

    <div class="form-group">
        <label for="nom">* Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" value="{{ $star->nom }}">
        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
        <small id="nomHelp" class="form-text text-muted">Le nom doit avoir entre 2 et 100 caractères.</small>
    </div>

    <div class="form-group">
        <label for="prenom">* Prenom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenomHelp" value="{{ $star->prenom }}">
        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
        <small id="prenomHelp" class="form-text text-muted">Le prenom doit avoir entre 2 et 100 caractères.</small>
    </div>

    <div class="form-group">
        <label for="description">* Description</label>
        <textarea class="form-control" id="description" name="description" aria-describedby="descHelp" rows="5" cols="33">
            {{ $star->description }}
        </textarea>
        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
        <small id="descHelp" class="form-text text-muted">Le nom doit avoir entre 2 et 100 caractères.</small>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">* Photo Star</span>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="photoHelp"">
            <label class="custom-file-label" for="photo">Choisir</label>
            {!! $errors->first('photo', '<small class="help-block">:message</small>') !!}
            <small id="photoHelp" class="form-text text-muted">Formats acceptés : jpeg,bmp,png,jpg. Aucune restriction de taille de fichier.</small>
        </div>
    </div>

    <button type="submit" class="btn btn-primary m-5">Modifier la star</button>

    </form>
@stop