<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminUserSearchRequest;
use App\Services\Domain\Admin\AdminUserManagementService;
use App\Services\Domain\Admin\AdminUserManagementSearchService;
use App\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    protected $adminUserManagement,$selectSorts,$selectSortKeys,$selectSortNums;

    private $radioIsOwners;

    /**
     * AdminUsersController constructor.
     * @param AdminUserManagementService $adminUserManagement 管理者管理サービス
     */
    public function __construct(AdminUserManagementService $adminUserManagement)
    {
        // 管理者管理サービス
        $this->adminUserManagement = $adminUserManagement;
        // 画面項目マスタのセット
        $this->radioIsOwners  = $this->adminUserManagement::getRadioIsOwners();
        $this->selectSorts    = $this->adminUserManagement::getSelectSorts();
        $this->selectSortKeys = $this->adminUserManagement::getSelectSortKeys();
        $this->selectSortNums = $this->adminUserManagement::getSelectSortNums();
    }

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
            'radioIsOwners' => $this->radioIsOwners,
            'selectSortKeys' => $this->selectSortKeys,
            'selectSorts' => $this->selectSorts,
            'selectSortNums' => $this->selectSortNums,
            'adminUsers' => $adminUserManagementSearchService($request),
        ]);
    }

}
