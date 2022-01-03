<?php


namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Serie;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class SeriesControllers extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function series(){
        $series = Serie::all();
        return view('series',['series'=>$series]);
    }

    public function commenter(Request $request, $id) {
        /*$this->validate(
            $request,
            [
                'note' => 'required',
                'content' => 'required',
            ]
        );*/

        $comment = new Comment();
        $comment->content= request('content');
        $comment->note = request('note');
        $comment->validated = 0;
        $comment->user_id = Auth::user()->id;
        $comment->serie_id = $id;
        $comment->save();
        return redirect()->route('detailsSerie', [$id]);
    }
}