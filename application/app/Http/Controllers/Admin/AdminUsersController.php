<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminUserSearchRequest;
use App\Services\Domain\AdminUserSearchService;
use Illuminate\Contracts\View\Factory;
use App\Services\Domain\AdminUserManagementService;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

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
     * @param AdminUserSearchService $adminUserSearchService
     * @return Factory|View
     */
    public function index(AdminUserSearchRequest $request, AdminUserSearchService $adminUserSearchService)
    {
        $request->validated();

        return view('admin.admin_users.index', [
            'radioIsOwners' => $this->radioIsOwners,
            'selectSortKeys' => $this->selectSortKeys,
            'selectSorts' => $this->selectSorts,
            'selectSortNums' => $this->selectSortNums,
            'adminUsers' => $adminUserSearchService($request),
        ]);
    }

}
