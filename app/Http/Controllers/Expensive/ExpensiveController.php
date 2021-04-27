<?php

namespace App\Http\Controllers\Expensive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expensive;
use App\Category;

class ExpensiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensives = Expensive::get();
        return view('admin.Expensive.expensive_add', compact('expensives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get();
        $expensives = Expensive::get();
        return view('admin.Expensive.expensive_add', compact('categories', 'expensives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


$item='';
foreach ($request->addmore as $key => $value) {

          /* $item.= $value->item.',';*/
           $item.=$value['item'].'_'.$value['qty'].'_'.$value['price'].'_'.$value['total'].',';

        }
  
     
 $insert = Expensive::insert([
            "category_id" => $request->category_id,
            "expense_date" => $request->expense_date,
            "comment" => $request->comment,
            'list_qty_price_total'=>$item,
             'total_expense'=>$request->total_expense,
        ]);
      

        /*$insert = new Expensive();
        $insert->category_id = $request->category_id;
        $insert->expense_date = $request->expense_date;
        $insert->comment = $request->comment;
        $insert->save();*/

        /*$insert = Expensive::insert([
            "category_id" => $request->category_id,
            "expense_date" => $request->expense_date,
            "comment" => $request->comment,
        ]);*/
      
        



        /*$itme=$request->item;
        $qty=$request->qty;
        $price=$request->price;
        $total=$request->total;

        $abcd=$item.'_'.$qty.'_'.$price.'_'.$total;

        foreach ($request->addmore as $key => $value) {

            Expensive::create($value);

        }
        return redirect()->back();*/
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
    public function destroy(Request $request)
    {
        $delete = Expensive::where("id", $request->id)->delete();
        if($delete){
                return response()->json("success");
        }else{
                
                return redirect()->back();
        }
    }
}
