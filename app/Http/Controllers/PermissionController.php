<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions.index');
    }

    public function index()
    {
        $permissions = Permission::latest()->when(request()->q, function ($permissions) {
            $permissions = $permissions->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.permission.index', compact('permissions'));
    }
}
