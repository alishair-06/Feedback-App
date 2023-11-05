<?php

namespace App\Http\Controllers;

use App\Models\catigory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use File;

class CatigoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = catigory::get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group mt-1 mr-1" role="group">
                    <button class="sm-btn btn btn-primary dropdown-toggle" id="btn3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                    <div class="dropdown-menu" aria-labelledby="btn3" style=""><a class="dropdown-item text-success upd" id="'.$row->catid.'">Update</a><a class="dropdown-item text-danger del" id="'.$row->catid.'">delete</a></div>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            
            return view('catigories');
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

        $class = catigory::updateOrCreate([
            'catid'   => $request->input('cat_id'),
        ],[
            'cat_title'     => $request->input('cat_name'),
            'cat_discription' => $request->input('cat_discription'),
            'cat_status' => $request->input('b_status')
        ]);
        $class->save();
        return response()->json([
            'message'   => 'created or updated successfully',
            'class_name'  => 'alert-success'
           ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catigory  $catigory
     * @return \Illuminate\Http\Response
     */
    public function show(catigory $catigory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catigory  $catigory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->ajax()){
            $idd = $request->id ;
            $edit = catigory::Find($idd);
            
            return ['Data_One'=>$edit];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catigory  $catigory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, catigory $catigory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catigory  $catigory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $edit = catigory::Find($request->id);
            $edit->delete();
        } 
    }


}
