<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DetailsControllers
{
    public function detailSeries($id_s){
        $s = Serie::find($id_s);

        //foreach($s as $rw){
          //  $tab3[] = Comment::find($rw->serie_id);
        //}


        return view('detailsSerie',['detailsSeries'=>$s]);

    }

    public function store(Request $request){

        $this->validate(
            $request,
            [
                'validated' => 'required'
            ]
        );

        $valider = new Valider;

        $valider->validated = $request->validated;

        if(isset($request->accomplie) && $request->accomplie == "on")
            $valider->accomplie = 1;
        else
            $valider->accomplie = 0;

        $valider -> save();
        //DB::table('seen')->insert([
        //    ['validated' => 0]
        //]);

        return redirect('/detailsSerie');

        //@foreach($tab3 as $v)
            //@if($v->validated == 0)
              //          <form action="{{route('detailsSerie.store')}}" method="POST">
            //                <input type="checkbox" id="val" name="val">
          //                  <label for="val">En attente de validation </label>
        //                </form>
      //  @endif
    //            @endforeach
    }
}