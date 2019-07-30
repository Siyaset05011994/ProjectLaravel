<?php

namespace App\Scopes;


use App\Models\Roles;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserScopes extends CommonScope
{
    private $current_user;

    public function __construct()
    {
        $this->current_user=Auth::user();
    }


    public function getUserDetailRole($request)
    {
        $users = DB::table('users')
            ->join('user_detail', 'users.id', '=', 'user_detail.user_id')
            ->join('roles','roles.id','=','users.role_id')
            ->select('users.name as full_name','users.id as user_id','users.email','users.status','user_detail.*','roles.name as role_name')
            ->where('users.name','LIKE','%'.$request->name.'%')
            ->where('users.email','LIKE','%'.$request->email.'%')
            ->where('user_detail.father_name','LIKE','%'.$request->father_name.'%')
            ->where('user_detail.dob','LIKE','%'.$request->dob.'%')
            ->where('user_detail.address','LIKE','%'.$request->address.'%')
            ->where('user_detail.created_at','LIKE','%'.$request->created_at.'%')
            ->where('user_detail.updated_at','LIKE','%'.$request->updated_at.'%')
            ->where( 'roles.name','LIKE','%'.$request->role.'%')
            ->orderBy('id','ASC')
        ;

        return $users;
    }

    public function getUserAccessRoles()
   {
       $current_user_role_type=$this->current_user->roles->type_status;
       $all_roles=Roles::all()->where('status',1);
//        ancaq type_statusu hazirki userin type_statusundan boyuk olan rolede user yarada biler, yeni ozunden asagi seviyyede .
       foreach ($all_roles as $role):
           if ($role->type_status>$current_user_role_type):
               $roles[$role->id]=$role->name;
           endif;
       endforeach;
//        ancaq type_statusu hazirki userin type_statusundan boyuk olan rolede user yarada biler, yeni ozunden asagi seviyyede .

       return $roles;
   }


   public function insUpUserDetail($user_detail,$request,$user)
   {
       $user_detail->user_id=$user->id;
       $user_detail->father_name=$request->father_name;
       $user_detail->dob=$request->dob;
       $user_detail->address=$request->address;
       $user_detail->creator=$this->current_user->id;
       $user_detail->created_at=self::customDateFormat();
       $user_detail->save();
   }


   public function saveUser($data)
   {
       return self::customSave($data);
   }


    public function int_exists_in_user($id)
    {
        if (!filter_var($id,FILTER_VALIDATE_INT)||User::where('id','=',$id)->count()==0)
        {
            die('This page not found !');
        }

    }


   public function customValidate1($id)
   {
       if(UserDetail::where('user_id',$this->current_user->id)->first()->creator!=0&&UserDetail::where('user_id',$id)->first()->creator!=$this->current_user->id)   //super admin deyilse ve bu userin creatoru deyilse
       {
               die('This page not found !');
       }
   }


}
