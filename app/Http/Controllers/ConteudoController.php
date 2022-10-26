<?php

namespace App\Http\Controllers;
        

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conteudos;
use App\Models\Playlists;

class ConteudoController extends Controller
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
        $all = Conteudos::all();
        return view("conteudo.list")->with('all',$all);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listByPlaylist($playlist_id)
    {
        
        //$conteudos = Conteudos::where('playlist_id', $playlist_id)->get();
       
        $pl = Playlists::find($playlist_id);
        return view("conteudo.listbyplaylist")                
                ->with('playlist',$pl->title)
                ->with('playlist_id',$playlist_id);

    }

    public function listAjaxByPlayList($playlist_id)
    {
      
        $all['data'] =  DB::table('conteudos')
                ->join('playlists', 'conteudos.playlist_id', '=', 'playlists.id')
                ->where('conteudos.playlist_id', $playlist_id)
                ->select('playlists.title AS playlist', 'conteudos.*')
                ->get();
        return $all;
    }

    public function listAjax()
    {
      
        $all['data'] =  DB::table('conteudos')
                ->join('playlists', 'conteudos.playlist_id', '=', 'playlists.id')
                ->select('playlists.title AS playlist', 'conteudos.*')
                ->get();
        return $all;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all = Playlists::all();    
        return view("conteudo.create")->with('all',$all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCompact($id)
    {
        $pl = Playlists::find($id);
        if(isset($pl)){
            return view("conteudo.createCompact")
                        ->with('playlist_id',$pl->id)
                        ->with('playlist',$pl->title);
        } 
       
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
            $c = New Conteudos();
            $c->playlist_id = $request->input('playlist_id');
            $c->title = $request->input('title');
            $c->url = $request->input('url');
            $c->author = $request->input('author');
            $c->save();
            return view("conteudo.create")->with('msg','Conteúdo adicionado com sucesso');
        } catch (Exception $e) {
            return 0;
        }   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCompact(Request $request)
    {
        try {

            $c = New Conteudos();
            $c->playlist_id = $request->input('playlist_id');
            $c->title = $request->input('title');
            $c->url = $request->input('url');
            $c->author = $request->input('author');
            $c->save();

            $pl = Playlists::find($request->input('playlist_id'));

            return view("conteudo.createCompact")
                    ->with('msg','Conteúdo adicionado com sucesso') 
                    ->with('playlist_id',$pl->id)
                    ->with('playlist',$pl->title);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all = Playlists::all();   
        $pl = Conteudos::find($id);
        if(isset($pl)){
            return view("conteudo.edit",compact('pl'))->with('all',$all);
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
        $pl = Conteudos::find($id);
        if(isset($pl)){
            try {
                $pl->playlist_id = $request->input('playlist_id');
                $pl->title = $request->input('title');
                $pl->url = $request->input('url');
                $pl->author = $request->input('author');
                $pl->save();
                return 1;
            } catch (Exception $e) {
                return 0;
            }
        }
        return redirect("list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pl = Conteudos::find($id);
        if(isset($pl)){
            $pl->delete();
            return redirect("/conteudo/list");
        }
    }
}
