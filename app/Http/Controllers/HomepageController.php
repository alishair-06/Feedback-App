<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\catigory;
use App\Models\Packages;
use App\Models\Item;
use App\Models\item_votes;
use Auth;

class HomepageController extends Controller
{

    public function index()  
    {
        $catigories = catigory::get();
        $item = Item::orderBy('itemid', 'desc')->join("users","users.id",'=','items.user_id')->join("catigories","catigories.catid",'=','items.cat_id')->paginate(10);
        return  view("index",["catigories"=>$catigories,"item"=>$item ]);
    }

    public function fvrt(Request $request, item_votes $item_votes)
    {
        if($request->ajax()){
            $idd= $request->id;
            if (!Auth::user()) {
                return response()->json([
                    'message'   => 'You Have to Login First',
                    'Success'  => false
                ]);
            }
            $a = $item_votes::where("item_id",$idd)->where("user_id", Auth::user()->id)->count();
            
            if ($a <= 0) {

                $edit = Item::Find($idd);
                $edit->vote = $edit->vote + 1;
                $edit->save();

                $item_votes::create([
                    "item_id"=> $idd,
                    "user_id"=> Auth::user()->id,
                ]);


                return response()->json([
                    'message'   => 'Added successfully',
                    'vote'  => true,
                    'Success'  => true
                ]);

            }else {

                $edit = Item::Find($idd);
                $edit->vote = $edit->vote - 1;
                $edit->save();

                $item_votes::where("item_id",$idd)->where("user_id",Auth::user()->id)->delete();

                return response()->json([
                    'message'   => 'updated successfully',
                    'vote'  => false,
                    'Success'  => true
                ]);
            }
        } 
    }
}