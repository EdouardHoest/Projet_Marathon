<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Episode;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ControlleurUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $is = $user->seen;
        $val = $user->comments;

        foreach ($is as $vu) {
            $tab[] = Serie::find($vu->serie_id);
        }
        $tab = array_unique($tab);

        $tab2 = Comment::all();
        return view('utilisateur.index', ['tab' => $tab, 'tab2' => $tab2]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $iu = User::find($id);
        return view('utilisateur.show', ['iu' => $iu]);
    }
}