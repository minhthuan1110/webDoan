<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\Admin;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    protected $repo;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->repo = $adminRepository;
    }

    /**
     * Lay id cua Admin
     */
    public function id()
    {
        return Auth::guard('admin')->id();
    }

    /*
    |---------------------------------------------------------------------------
    | Admin Manager 'admin accounts'
    |---------------------------------------------------------------------------
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = $this->repo->getAll(['id', 'name', 'email', 'avatar_image_path', 'created_at']);

        return view('backend.admin.index', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rs = $this->repo->store($request);
        toast($rs['msg'], $rs['stt']);

        return redirect()->route('admin.manage.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($adminId)
    {
        $admin = $this->repo->show($adminId);
        return view('backend.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminId)
    {
        $rs = $this->repo->update($request, $adminId);
        toast($rs['msg'], $rs['stt']);

        return back();
    }

    /**
     * Edit permission for Admin
     */
    public function editPermission($adminId)
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $admin = Admin::find($adminId);

        return view('backend.admin.role_permission', compact('permissions', 'roles', 'admin'));
    }

    /**
     * Update permission for Admin
     */
    public function updatePermission(Request $request, $adminId)
    {
        $admin = $this->repo->find($adminId);

        if (empty($request->role_id) && empty($request->permission_id)) {
            toast(__('Lỗi phân quyền'), 'error');
            return back();
        }

        $roles = $request->role_id ?? [];
        $admin->syncRoles($roles);

        $permissions = $request->permission_id ?? [];
        $admin->syncPermissions($permissions);

        toast(__('Phân quyền thành công!'), 'success');
        return redirect()->route('admin.manage.index');
    }

    /**
     * Block admin account.
     *
     * @param  int  $adminId
     * @return \Illuminate\Http\Response
     */
    public function block($adminId)
    {
        $rs = $this->repo->block($adminId);

        return response()->json($rs);
    }

    /**
     * UnBlock admin account.
     *
     * @param  int  $adminId
     * @return \Illuminate\Http\Response
     */
    public function unblock($adminId)
    {
        $rs = $this->repo->unblock($adminId);

        return response()->json($rs);
    }

    /*
    |---------------------------------------------------------------------------
    | Admin Profile.
    |---------------------------------------------------------------------------
    */
    /**
     * Edit my admin-account
     */
    public function editAccount()
    {
        $account = $this->repo->show($this->id());
        // dd($account);
        return view('backend.account.my_account', compact('account'));
    }

    /**
     * Update my admin-account
     */
    public function updateAccount(Request $request)
    {
        $rs = $this->repo->updateProfile($request, $this->id());
        toast($rs['msg'], $rs['stt']);

        return back();
    }

    /**
     * Change password for my account.
     */
    public function changePassword()
    {
        return view('backend.account.change_password');
    }

    /**
     * Update password for my account
     */
    public function updatePassword(Request $request)
    {
        $rs = $this->repo->updatePassword($request, $this->id());
        if (!empty($rs['error_messages'])) {
            session()->flash('errors', $rs['error_messages']);
        }
        toast($rs['msg'], $rs['stt']);

        return redirect()->back();
    }
}
