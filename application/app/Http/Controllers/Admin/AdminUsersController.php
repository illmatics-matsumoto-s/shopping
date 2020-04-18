<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminUserSearchRequest;
use App\Services\Domain\Admin\AdminUserManagementSearchService;
use App\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    /**
     * Action:search
     *
     * @param AdminUserSearchRequest $request
     * @param adminUserManagementSearchService $adminUserManagementSearchService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AdminUserSearchRequest $request, AdminUserManagementSearchService $adminUserManagementSearchService)
    {
        $request->validated();

        return view('admin.admin_users.index', [
            'adminUsers' => $adminUserManagementSearchService($request),
        ]);
    }

}
