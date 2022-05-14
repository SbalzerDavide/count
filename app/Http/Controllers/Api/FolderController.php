<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Folder;
use App\User;

// $id = Auth::id();
$id = "ciao";

class FolderController extends Controller
{
    // per proteggere la rotta da autenticazione
    // non credo funzioni perchè dovrei passare il token nella chiamata di rete
    // token che però non conosco in vue ma solo in blade
    // tanto lìvale passare l'id dell'utente tramite vue
    // public function __construct()
    // {
    //     // da trasferire nel web.php per maggior chiarezza?
    //     $this->middleware('auth');
    // }


    // dato che non devo fare un controllo di autenticazione, che ho assodato non posso fare da vue, posso piùsemplicemente fare un controllo di corrispondenza tra id utente (is_user) e nome utente abbinato. li passere criptati con un semplice stringify e encode da js e poi decripto i dati in php e faccio passare la richiesta solo se l'id corrisponde a il nome utente salvato su db


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        // recupero dati facendo un decode di quello che ho passato nella chiamata
        $userAuthString = base64_decode($data["userInfo"], true);
        $userAuth = json_decode($userAuthString, true);
        $userId = intval($userAuth["userId"]);
        $userName = $userAuth["userName"];
        $user = DB::table('users')
            ->where('users.id', $userId)
            ->get();
        $folders;
        // verifico che i dati di di e email conmbacino con quelli del db
        if ($user[0]->email === $userName){
            // nel caso in cui coincidono cerco le cartelle
            // è una simulazione di autenticazione lato server
            // non posso fare nativa perchè i dati di auth li conosce solo laravel e non vue
            $folders = DB::table('folders')
            ->where('folders.user_id', $userId)
            ->get();
        }

        return response()
            ->json($folders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        // la validazione dei dati la farò eventualmente lato client
        
        //save in DB
        $folder = new Folder;
        $folder->name = $data['name'];
        $folder->user_id = $data['id'];        
        
        $saved = $folder->save();
        
        if($saved){
            return response()
                ->json($request);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        // id arrivato
        // autenticazione non attiva
        // per gestire autenticazione nel modo un cui ho fatto dovrei non avere le srud impostate in questo modo  ma dovrei gestirle io personalizzate per poter passare sempre tutti i parametri
        // in questo caso sarebbero divise semplicemente tra get e post e le indicazioni più specifiche sull'azione da fare sarebbero passate nei parametri della chiamata
        // non male come idea 
        // accedo alla table che contiene i dettagli delle singole folder
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
