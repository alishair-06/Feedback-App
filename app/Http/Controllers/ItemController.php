<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\catigory;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Auth;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Item::join('catigories', 'catigories.catid', '=', 'items.cat_id')->orderBy('itemid', 'DESC')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group mt-1 mr-1" role="group">
                    <button class="sm-btn btn btn-primary dropdown-toggle" id="btn3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                    <div class="dropdown-menu" aria-labelledby="btn3" style=""><a class="dropdown-item text-success upd" id="'.$row->itemid.'">Update</a><a class="dropdown-item text-danger del" id="'.$row->itemid.'">delete</a></div>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
            $catigories = catigory::get();
            return  view("item",["catigories"=>$catigories ]);
            // return view('item');
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
        if (Auth::user()->blocked) {
            return response()->json([
                'message'   => 'You Have Been Blocked By Admin',
                'Success'  => false
            ]);
        }
        $class = Item::updateOrCreate([
            'itemid'   => $request->input('i_id'),
        ],[
            'item_title'     => $request->input('item_name'),
            'item_discription' => $request->input('item_discription'),
            'cat_id' => $request->input('cat_id'),
            'user_id' => Auth::user()->id
        ]);
        $class->save();

        if ($request->input('i_id') != null) {
            return response()->json([
                'updated'   => true
            ]);
        }
        $data = Item::join("users","users.id","=","items.user_id")->where("itemid",$class->itemid)->first();
        return response()->json([
            'message'   => 'created or updated successfully',
            'class_name'  => 'alert-success',
            'data'=> $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->ajax()){
            $idd = $request->id ;
            $edit = Item::Find($idd);
            return ['Data_One'=>$edit];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $edit = Item::Find($request->id);
            Reviews::where("rev_featured",$request->id)->delete();
            $edit->delete();

        } 
    }
}