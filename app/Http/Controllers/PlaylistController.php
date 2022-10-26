<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Conteudos;
use App\Models\Playlists;


class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $all = Playlists::all();
        return view("list")->with('all',$all);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAjax()
    {
        $all['data'] = Playlists::all();
        return $all; //<== ESSE RETORNO JÁ É EM JSON (PODE TESTAR A ROTA NO POSTMAN OU SIMILAR: api/playlist/listAjax)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $pl = New Playlists();
            $pl->title = $request->input('title');
            $pl->description = $request->input('description');
            $pl->author = $request->input('author');
            $pl->save();
            return view("create")->with('msg','Playlist criada com sucesso');
        } catch (Exception $e) {
            return 0;
        }    
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pl = Playlists::find($id);
        if(isset($pl)){
            return $pl;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pl = Playlists::find($id);
        if(isset($pl)){
            $conteudos = Conteudos::where('playlist_id', $id)->get();
            return view("edit",compact('pl'))->with('conteudos',$conteudos);
        }
        return redirect("list"); 

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
        $pl = Playlists::find($id);
        if(isset($pl)){
            try {
                $pl->title = $request->input('title');
                $pl->description = $request->input('description');
                $pl->author = $request->input('author');
                $pl->save();
                return 1;
            } catch (Exception $e) {
                return 0;
            }
        }
        return 0;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pl = Playlists::find($id);
        if(isset($pl)){
            $pl->delete();
            return redirect("/playlist/list");
        }
        //
    }
}
