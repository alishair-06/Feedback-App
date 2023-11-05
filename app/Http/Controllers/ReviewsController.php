<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Auth;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Reviews::join('users', 'reviews.user_id', '=', 'users.id')->get();
        return  view("reviews",["reviews"=>$reviews ]);
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
        if (!Auth::user()) {
            return response()->json([
                'message'   => 'You Have to Login First',
                'Success'  => false
            ]);
        }
        if (!$request->input('rird')) {
            $class = Reviews::updateOrCreate([
                'reviewid'   => $request->input('rird'),
            ],[
                'user_id'     => Auth::user()->id,
                'rev_msg' => $request->input('reply_message'),
                'rev_featured' => null, 
                'child_of' => $request->input('child'), 
                'rev_date' => date('Y-m-d H:i'), 
            ]);
            $class->save();
            $x = $class->reviewid;
            $idd = Reviews::join("users","users.id","=","reviews.user_id")->where("reviewid",$x)->first();
            
            return response()->json([
                'message'   => 'Thanks for your Review , your review has been posted',
                'update'  => false,
                "replay" => $idd
               ]);
        }else{

            $class = Reviews::updateOrCreate([
                'reviewid'   => $request->input('rird'),
            ],[
                'rev_msg' => $request->input('reply_message')
            ]);
            $class->save();
            $x = $class->reviewid;
            $idd = Reviews::join("users","users.id","=","reviews.user_id")->where("reviewid",$x)->first();
            
            return response()->json([
                'message'   => 'Updated Successfully',
                'update'  => true,
                "replay" => $idd
               ]);
        }
    }



    public function store_new(Request $request)
    {
        if (!Auth::user()) {
            return response()->json([
                'message'   => 'You Have to Login First',
                'Success'  => false
            ]);
        }
        if (!$request->input('rird')) {
            $class = Reviews::updateOrCreate([
                'reviewid'   => $request->input('rird'),
            ],[
                'user_id'     => Auth::user()->id,
                'rev_msg' => $request->input('reply_message'),
                'rev_featured' => $request->input('parent_item'), 
                'child_of' => null, 
                'rev_date' => date('Y-m-d H:i'), 
            ]);
            $class->save();
            $x = $class->reviewid;
            $idd = Reviews::join("users","users.id","=","reviews.user_id")->where("reviewid",$x)->first();
            
            return response()->json([
                'message'   => 'Thanks for your Review , your review has been posted',
                'update'  => false,
                "replay" => $idd
            ]);

        }else{

            $class = Reviews::updateOrCreate([
                'reviewid'   => $request->input('rird'),
            ],[
                'rev_msg' => $request->input('reply_message')
            ]);
            $class->save();
            $x = $class->reviewid;
            $idd = Reviews::join("users","users.id","=","reviews.user_id")->where("reviewid",$x)->first();
            
            return response()->json([
                'message'   => 'Updated Successfully',
                'update'  => true,
                "replay" => $idd
               ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->ajax()){
            $idd = $request->id; 
            $edit = Reviews::Find($idd);
            return ['Data_One'=>$edit];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $idd= $request->id;
            $edit = Reviews::Find($idd);
            
            $edit->delete();

            return response()->json([
                'message'   => 'deleted successfully',
                'class_name'  => 'alert-success'
               ]);

        } 
    }

    public function fvrt(Request $request)
    {
        if($request->ajax()){
            $idd= $request->id;
            $edit = Reviews::Find($idd);
            if ($edit->rev_featured == 1) {

                $edit->rev_featured = 0;
                $edit->save();
                return response()->json([
                    'message'   => 'created or updated successfully',
                    'class_name'  => 'alert-success'
                ]);

            }else {

                $edit->rev_featured = 1;
                $edit->save();
                return response()->json([
                    'message'   => 'created or updated successfully',
                    'class_name'  => 'alert-success'
                ]);
            }
            

        } 
    }

    public function destroy_pic(Request $request)
    {
        if($request->ajax()){
            $edit = Review_pics::Find($request->id);
            if ($edit->rpic_title != "") {
                $imagePath = public_path('images/'.$edit->rpic_title);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }
            }
            $edit->delete();
        } 
    }


    public function album(Request $request)
    {
        if($request->ajax()){
            $idd = Crypt::decryptString($request->id); 
            $reviews = Review_pics::where('review_id', '=', $idd)->get();
            $data1 ='';
            $numItems = $reviews->last();
                foreach ($reviews as $key => $value) {
                    if ($numItems->rpic_title == $value->rpic_title) {
                        $data1 .='<div class="col-sm-12"  >
                        <img src="images/'.$value->rpic_title.'" style="max-width: 100%; min-width: 250px; " class="" alt="K - solutions">
                        </div>';
                    }else {
                        $data1 .='<div class="col-sm-12 pb-3"  >
                    <img src="images/'.$value->rpic_title.'" style="max-width: 100%; min-width: 250px; " class="" alt="K - solutions">
                    </div>';
                    }
                    
                }
            return ['Data_One'=>$data1];
            // return Response($edit);
        }
    }
}
