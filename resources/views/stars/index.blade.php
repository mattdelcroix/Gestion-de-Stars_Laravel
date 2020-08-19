@extends('template')

@section('title')
    | index
@stop

@section('content')
    <h1 class="bd-title m-5" id="content">Liste des stars</h1>

    <div class="accordion" id="accordionExample">
        @foreach($stars as $star)
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $star->id }}" aria-expanded="true" aria-controls="collapseOne">
                        {{ $star->nom }} {{ $star->prenom }}
                    </button>
                </h2>
                </div>

                <!-- id="collapse{{ $star->id }}" pour rendre l'accordeon actif -->
                <div id="collapse{{ $star->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <img src=" {{ asset("storage/" . $star->photo) }}" alt="" width="200" height="300" title="photo {{ $star->id }}">
                    {{ $star->description }}
                </div>
                </div>
            </div>
        @endforeach
    </div>
@stop