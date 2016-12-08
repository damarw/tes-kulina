<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Models\UserReview as DataUtama;
use validate;
use Validator;
class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataUtama::all();
        return $data;
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
        //dd('hard');
         $validation = Validator::make($request->all(), [
        'product_id' => 'required',
        'rating' => 'max:5|numeric',
        'review' => 'required',
        ]);
        if($validation->fails()){
            return [$validation->messages(),200];
        }
        $data = new DataUtama();
        $data->order_id = $request->order_id;
        $data->product_id = $request->product_id;
        $data->rating = $request->rating;
        $data->review = $request->review;
        $data->save();
        $messages=['message'=>'succes'];
        return $messages;
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DataUtama::find($id);
        return $data;
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
        $validation = Validator::make($request->all(), [
        'product_id' => 'required',
        'rating' => 'max:5|numeric',
        'review' => 'required',
        ]);
        if($validation->fails()){
            return [$validation->messages(),200];
        }
        $data = DataUtama::find($id);
        $data->order_id = $request->order_id;
        $data->product_id = $request->product_id;
        $data->rating = $request->rating;
        $data->review = $request->review;
        $data->save();
        $messages=['message'=>'update succes'];
        return $messages;  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataUtama::find($id);
        $data->delete();
        $messages=['message'=>'delete succes'];
        return $messages;   
    }
}
