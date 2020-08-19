<?php

namespace App\Http\Controllers;

//Importation du model Star
use App\Star;


//Importation de la requête (validation) pour les stars.
use App\Http\Requests\StarRequest;
use Illuminate\Http\Request;


//Importation de la façade Storage pour les uploads.
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Récupère toutes les starts en BDD
        $stars = Star::all();
        
        //Retourne la vue index avec la collection de stars
        return View('stars.index', ['stars' => $stars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retourne la vue avec le formulaire de création de star
        return View('stars.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StarRequest $request)
    {
        //  Avec isValid, on vérifie que l'upload s'est bien effectué.
        if ($request->file('photo')->isValid()) {

            //Il est important d'executer la commande "php artisan storage:link" 
            //afin de lier le dossier de storage au dossier public avant de procéder à l'upload.

            //Storage de la photo dans le projet : /storage/app/public/photoStars
            //(PhotoStars se crée automatiqument si il n'existe pas.)
            $path = Storage::putFile('public\photoStars', $request->file('photo'));

            //Modification du nom du chemin pour BDD. Affichage directe dans l'index en suivant.
            $path = str_replace("public\\", "", $path);

            //Enregiste en BDD la requête après validation            
            $star = Star::create(array_merge($request->only(['nom', 'prenom', 'description']), ['photo' => $path]));
        }

        //Redirecte sur l'index
        return redirect()->route('backoffice');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Nous n'utiliserons pas cette méthode car l'affichage s'executera sur l'index.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Récupération de la star
        $star = Star::findOrFail($id);

        //Retourne la vue avec le formulaire de modification et l'objet contenant la star.
        return view('stars.update', ['star' => $star]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Récupération de la star à modifier
        $star = Star::findOrFail($id);

        if($request->file('photo')->isValid()) {
            //Il est important d'executer la commande "php artisan storage:link" 
            //afin de lier le dossier de storage au dossier public avant de procéder à l'upload.

            //Storage de la photo dans le projet : /storage/app/public/photoStars
            //(PhotoStars se crée automatiqument si il n'existe pas.)
            $path = Storage::putFile('public\photoStars', $request->file('photo'));

            //Modification du nom du chemin pour BDD. Affichage directe dans l'index en suivant.
            $path = str_replace("public\\", "", $path);

            //Suppression de l'ancienne image
            Storage::delete('public/' . $star->photo);

            //Ajout du nouveau nom d'image pour la star.
            $star->photo = $path;

        };
        

        //Récupération des champs du formulaire
        $input = $request->only(['nom', 'prenom', 'description']);
        
        //Modification en BDD
        $star->fill($input)->save();

        //Redirection sur l'index
        return redirect()->route('gestion');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Récupère la star
        $star = Star::findOrFail($id);
        
        //Suppression de l'ancienne image
        Storage::delete('app/public/' . $star->photo);

        //Supprime la star de la BDD
        $star->delete();

        //Redirecte sur l'index
        return redirect()->route('gestion');
    }

    public function gestion(){
        //Récupère toutes les stars via Eloquent
        $stars = Star::all();        

        //Retourne la vue 'gestion' avec la liste des stars
        return view('stars.gestion', ['stars' => $stars]);
    }
}
