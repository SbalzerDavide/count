<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Note;
use App\User;


class NoteController extends Controller
{
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
        $idFolder = $data["idFolder"];
        $userAuth = json_decode($userAuthString, true);
        $userId = intval($userAuth["userId"]);
        $userName = $userAuth["userName"];
        $user = DB::table('users')
            ->where('users.id', $userId)
            ->get();
        $notes;
        // verifico che i dati di di e email conmbacino con quelli del db
        if ($user[0]->email === $userName){
            // nel caso in cui coincidono cerco le cartelle
            // è una simulazione di autenticazione lato server
            // non posso fare nativa perchè i dati di auth li conosce solo laravel e non vue
            $notes = DB::table('notes')
            ->where('notes.folder_id', $idFolder)
            ->get();
        }

        return response()
            ->json($notes);
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
        // dd($data);
        
        // // la validazione dei dati la farò eventualmente lato client
        
        //save in DB
        $note = new Note;
        $note->title = $data['title'];
        $note->type = $data['type'];
        $note->star = $data['star'];
        $note->content = $data['content'];
        $note->folder_id = $data['folder_id'];        
        
        $saved = $note->save();
        
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
        $note = DB::table('notes')
            ->find($id);
        return response()
            ->json($note);

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
