<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Scopes\UserScopes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    private $model;
    private $current_user;

    public function __construct()
    {
        $this->model='User';
        //constructorda Auth::user() cagiranda problem yarandi .
        $this->middleware(function ($request, $next) {
            $this->current_user = Auth::user();
            return $next($request);
        });

    }


    public function index(Request $request)
    {
        $users = new UserScopes();
        $users=$users->getUserDetailRole($request);

         if(UserDetail::where('user_id',$this->current_user->id)->first()->creator!=0) //super admin deyilse
         {
             $users->where('user_detail.creator',$this->current_user->id);
         }

            $users=$users->paginate(4);
            $users->withPath($request->fullUrl()); //axtaris neticesi geelnde pagination olanda diger sehifeleri basanda parametrleri aparmir deye butun neticeler cixirdi.

            return view('pages.admin.users',['users'=>$users,'current_user_creator'=>$this->current_user->userDetail->creator]);

    }


    public function self_users(Request $request)
    {
            $self_users=new UserScopes();
            $self_users->int_exists_in_user($request->id); // gelen id'nin inter olub olmamasini ve bazada olub olmamasini yoxlayir .

            $self_users=$self_users->getUserDetailRole($request)->where('user_detail.creator','=',$request->id);
            $self_users=$self_users->paginate(4);
            $self_users->withPath($request->fullUrl()); //axtaris neticesi gelende pagination olanda diger sehifeleri basanda parametrleri aparmir deye butun neticeler cixirdi.

            return view('pages.admin.self_users',['self_users'=>$self_users]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userScopes=new UserScopes();
        $roles=$userScopes->getUserAccessRoles(); //yaratmasina icaze verdiyim role'ler
        return view('pages.admin.add_user',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatorRules=
            [
                'name'=>'required|min:3',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|confirmed', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                'father_name'=>'required|min:3', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                'dob'=>'required|date_format:m/d/Y', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                'address'=>'required', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                'role'=>'required|exists:roles,id', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
            ];

        $validate=Validator::make($request->all(),$validatorRules);

        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        else
        {
            $userScopes=new UserScopes();
            $roles=$userScopes->getUserAccessRoles(); //yaratmasina icaze verdiyim role'ler

            if (!in_array($request->role,array_keys($roles))):
                return 'Not Access !';
            endif;

              $user=new User();
              $user->name=$request->name;
              $user->email=$request->email;
              $user->password=Hash::make($request->password);
              $user->role_id=$request->role;
              $insert_user=$user->save();

              if ($insert_user)
              {
                  $user_detail=new UserDetail();
                  $userScopes=new UserScopes();
                  $userScopes->insUpUserDetail($user_detail,$request,$user);
                  return redirect()->route('users');
              }
              else
              {
                    echo 'user not inserted !';
              }
        }

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
             $userScopes=new UserScopes();
             $userScopes->int_exists_in_user($id); // gelen id'nin inter olub olmamasini ve bazada olub olmamasini yoxlayir .
             $userScopes->customValidate1($id); //eyni zamanda hem super admin deyilse ve hem de bu userin creatoru deyilse xeta sehifesine yoneltmek ucun kod

             $user=User::find($id);
             $roles=$userScopes->getUserAccessRoles(); //yaratmasina icaze verdiyim role'ler
             return view('pages.admin.edit_user',['user'=>$user,'roles'=>$roles]);
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
        $userScopes=new UserScopes();
        $userScopes->int_exists_in_user($id); // gelen id'nin inter olub olmamasini ve bazada olub olmamasini yoxlayir .

            $validatorRules=
                [
                    'name'=>'required|min:3',
                    'email'=>'required|email',
                    'father_name'=>'required|min:3', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                    'dob'=>'required|date_format:m/d/Y', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                    'address'=>'required', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                    'role'=>'required|exists:roles,id', //viewde x ve x_confirmation yazib burda confirmed yazanda ozu yoxlayir eyni olub olmadigini .
                ];

            $user=User::find($id);

            if (!empty(trim($request->password)))
            {
                   $validatorRules['password']='required|min:6|confirmed';
                   $user->password=Hash::make($request->password);
            }

            $validate=Validator::make($request->all(),$validatorRules);

            if ($validate->fails())
            {
                return redirect()->back()->withErrors($validate)->withInput();
            }
            else
            {
                $userScopes=new UserScopes();
                $roles=$userScopes->getUserAccessRoles(); //yaratmasina icaze verdiyim role'ler

                if (!in_array($request->role,array_keys($roles))):
                    return 'Not Access !';
                endif;

                $user->name=$request->name;
                $user->email=$request->email;
                $user->role_id=$request->role;
                $update_user=$user->save();

                if ($update_user)
                {
                    $user_detail=UserDetail::find($id);
                    $userScopes=new UserScopes();
                    $userScopes->insUpUserDetail($user_detail,$request,$user);
                    return redirect()->route('users');
                }
                else
                {
                    echo 'user not updated !';
                }
            }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id,$status)
    {
        $userScopes=new UserScopes();
        $userScopes->int_exists_in_user($id); // gelen id'nin inter olub olmamasini ve bazada olub olmamasini yoxlayir .
        $userScopes->customValidate1($id); //eyni zamanda hem super admin deyilse ve hem de bu userin creatoru deyilse xeta sehifesine yoneltmek ucun kod

            $status_db = 0;
            if ($status == 0):
                $status_db = 1;
            endif;

            $user = User::find($id);
            $user->status = $status_db;
            $user->save();
            return redirect()->route('users');

    }




}
