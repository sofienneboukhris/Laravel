<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Hotels;
use App\Ville;
use App\Arrangemnt;
use App\Price;
use App\Scarping;
use App\Data;
use DB ;

class GetController extends Controller
{
    function get(){
        $Hotels = new Hotels ();
        $Hotels = Hotels::all();
        return response()->json( $Hotels);

        $Ville = new Ville();
        $Ville = Ville::all();
        return response()->json( $Ville);

        $Arrangemnt = new Arrangemnt ();
        $Arrangemnt = Arrangemnt::all();
        return response()->json( $Arrangemnt);

        $Price = new Price ();
        $Price = Price::all();

        return response()->json( $Price);
        $Scarping = new Scarping ();
        $Scarping = Scarping::all();
        return response()->json( $Scarping);

        $Data = new Price ();
        $Data = Price::all();

        return response()->json( $Data);
    }
   public function unique(){
        $libelle_hotnb= DB::table('hotels')
        ->select( DB::raw('MIN(id) as id'),'libelle_hot')
        ->groupBy('libelle_hot')
        ->get();
        return response()->json($libelle_hotnb);
    }

    public function post( Request $request )
    {
        $selectedOption = $request->input('selectedOption');
        $date1 =$request->input('date1');
        $date2 =$request->input('date2');

        $chart= $this->getValueChart( $date1,$date2,$selectedOption);
        return response()->json([
            'chart'=> $chart
            ]);
    }


    // public function chart( Request $request)
    // {
    //     $selectedOption = $request->input('selectedOption');
    //     $hot= $this->getSelectedOption($selectedOption);
    //     $date1 =$request->input('date1');
    //     $date2 =$request->input('date2');
    //     $data = $this->getDateDiff($date1,$date2);

    //     return response()->json(['data'=>$data,'hotels'=>$hot]);
    // }
    // function getSelectedOption($selectedOption){
    //     $hotels = DB::table('hotels')
    //         ->select('id','libelle_hot')
    //         ->where('libelle_hot' , $selectedOption)
    //         ->get();
    //     return $hotels;
    // }
    function getValueChart($start_date,$end_date,$selectedOption){

        $hotels = DB::table('hotels')
        ->join('price', 'hotels.id', '=', 'price.id')
        ->select(DB::raw('MIN(price.id) as id'),'price.date_dep',DB::raw('MIN(hotels.libelle_hot) as hotel'),DB::raw('MIN(price.prices) as price'))
        ->where('hotels.libelle_hot' , $selectedOption)
        ->whereBetween('price.date_dep', [$start_date, $end_date])
        ->groupBy('price.date_dep')
        ->get();

        return  $hotels;
    }
}
