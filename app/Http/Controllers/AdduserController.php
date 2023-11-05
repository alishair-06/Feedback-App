<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AdduserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('is_admin', function($row){
                    if ($row->is_admin == 1) {
                        $user_status = "Admin";
                    }else {
                        $user_status = "User";
                    }
                    return $user_status;
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group mt-1 mr-1" role="group">
                    <button class="sm-btn btn btn-primary dropdown-toggle" id="btn3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                    <div class="dropdown-menu" aria-labelledby="btn3" style="">
                    <a class="dropdown-item text-success upd" id="'.$row->id.'">Update</a>
                    <a class="dropdown-item text-danger del" id="'.$row->id.'">delete</a></div>
                    </div>';
                    return $btn;
                })
                ->rawColumns(['action','is_admin'])
                ->make(true);
                
            
            }
            
            return view('user');
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
        if ($request->passwordhid !='') {
            $find = User::where("email",$request->email)->first();
            if ($find && $request->input('i_id') == "") {
                return response()->json([
                    'err'   => 'Try to change the email',
                    'class_name'  => 'alert-danger'
                   ]);
            }
            $user = User::updateOrCreate([
                'id'   => $request->input('i_id'),
            ],[    
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => $request->user_role 
            ]); 
        }else{
            // $find = User::where("email",$request->email)->first();
            // if ($find && $request->input('i_id') == "") {
            //     return response()->json([
            //         'err'   => 'User is already Assinged',
            //         'class_name'  => 'alert-success'
            //        ]);
            // }
            // $user = User::updateOrCreate([
            //     'id'   => $request->input('i_id'),
            // ],[    
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'is_admin' => $request->user_role 
            // ]);

             // Validate the input fields
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => [
                    'required',
                    'string',
                    'min:10',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/',
                ],
                // Add other validation rules for fields like 'name' and 'user_role' if needed
            ]);

            // If validation fails, return error response
            if ($validator->fails()) {
                return response()->json([
                    'err' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 400); // Adjust the status code as needed
            }

            // Try to find the user by email
            $find = User::where("email", $request->email)->first();

            // If user found and 'i_id' is empty, return error response
            if ($find && empty($request->input('i_id'))) {
                return response()->json([
                    'err' => 'User is already assigned',
                    'class_name' => 'alert-success'
                ]);
            }

            // Update or create the user
            $user = User::updateOrCreate(
                ['id' => $request->input('i_id')],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'is_admin' => $request->user_role,
                ]
            );

            // Return success response
            return response()->json([
                'message' => 'User updated/created successfully',
                'user' => $user,
            ]);

        }
        

        

        event(new Registered($user));
        return response()->json([
            'message'   => 'created or updated successfully',
            'class_name'  => 'alert-success'
           ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function show(Adduser $adduser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->ajax()){
            $idd = $request->id ;
            $edit = User::Find($idd);
            
            return Response($edit);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adduser $adduser)
    {
        //
    }


    public function storee(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{

        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        return response()->json([
            'message'   => 'created or updated successfully',
            'class_name'  => 'alert-success'
           ]);
        }
    }



    public function c_store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => null ,
        ]);
        // $user->markEmailAsVerified();

        event(new Registered($user));
        Auth::login($user);  
        return redirect('/');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()){
            $edit = User::Find($request->id);
            $edit->delete();
        } 
    }


}
