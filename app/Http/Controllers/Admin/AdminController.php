<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\AssignUserRoleRequest;
use App\Http\Requests\Admin\ChangeUserPasswordRequest;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
 
    public function index()
    {
         $admins = Admin::whereNot('id', Auth::user()->id)->latest()->get();
        $roles = Role::orderBy('id', 'DESC')->whereNot('name', 'like', '%super%')->get();
        return view('admin.masters.admins')->with(['admins'=> $admins, 'roles'=> $roles]);
       
       
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $input['password'] = Hash::make($input['password']);
            $admin = Admin::create( Arr::only( $input, Auth::admin()->getFillable() ) );
            DB::table('model_has_roles')->insert(['role_id'=> $input['role'], 'model_type'=> 'App\Models\Admin', 'model_id'=> $admin->id]);
            DB::commit();
            return response()->json(['success'=> 'User created successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'creating', 'User');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $roles = Role::whereNot('name', 'like', '%super%')->get();
        $admin->loadMissing('roles');

        if ($admin)
        {

            $roleHtml = '<span>
                <option value="">--Select Role --</option>';
                foreach($roles as $role):
                    $is_select = $role->id == $admin->roles[0]->id ? "selected" : "";
                    $roleHtml .= '<option value="'.$role->id.'" '.$is_select.'>'.$role->name.'</option>';
                endforeach;
            $roleHtml .= '</span>';


            $response = [
                'result' => 1,
                'admin' => $admin,
                'roleHtml' => $roleHtml,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, Admin $admin)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $admin->update( Arr::only( $input, Auth::admin()->getFillable() ) );
            $admin->roles()->detach();
            DB::table('model_has_roles')->insert(['role_id'=> $input['role'], 'model_type'=> 'App\Models\Admin', 'model_id'=> $admin->id]);
            DB::commit();

            return response()->json(['success'=> 'admin updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function toggle(Request $request, Admin $admin)
    {
        $current_status = DB::table('admins')->where('id', $admin->id)->value('active_status');
        try
        {
            DB::beginTransaction();
            if($current_status == '1')
            {
                Admin::where('id', $admin->id)->update([ 'active_status' => '0' ]);
            }
            else
            {
                Admin::where('id', $admin->id)->update([ 'active_status' => '1' ]);
            }
            DB::commit();
            return response()->json(['success'=> 'Admin status updated successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'Admin\'s status');
        }
    }

    public function retire(Request $request, Admin $admin)
    {
        try
        {
            DB::beginTransaction();
                $admin->delete();
            DB::commit();
            return response()->json(['success'=> 'Employee retired successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'Employee\'s retirement status');
        }
    }

    public function changePassword(ChangeUserPasswordRequest $request, Admin $admin)
    {
        $input = $request->validated();
        try
        {
            DB::beginTransaction();
            $admin->update([ 'password' => Hash::make($input['new_password']) ]);
            DB::commit();
            return response()->json(['success'=> 'Password updated successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'Admin\'s password');
        }

    }


    public function getRole(Admin $admin)
    {
        $admin->load('roles');
        if ($admin)
        {
            $roles = Role::orderBy('id', 'DESC')->get();
            $roleHtml = '<span>
                <option value="">--Select Role--</option>';
                foreach($roles as $role):
                    $is_select = $role->id == $admin->roles[0]->id ? "selected" : "";
                    $roleHtml .= '<option value="'.$role->id.'" '.$is_select.'>'.$role->name.'</option>';
                endforeach;
            $roleHtml .= '</span>';

            $response = [
                'result' => 1,
                'admin' => $admin,
                'roleHtml' => $roleHtml,
            ];
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }


    public function assignRole(Admin $admin, AssignUserRoleRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $admin->roles()->detach();
            DB::table('model_has_roles')->insert(['role_id'=> $request->edit_role, 'model_type'=> 'App\Models\Admin', 'model_id'=> $admin->id]);
            DB::commit();
            return response()->json(['success'=> 'Role updated successfully']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'changing', 'Admin\'s role');
        }
    }
}
