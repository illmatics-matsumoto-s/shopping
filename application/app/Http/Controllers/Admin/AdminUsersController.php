<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Services\Admin\AdminUserManagementService;
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $conditions = [];
        $conditions = [
            'name'  => $request->input('name',''),
            'email' => $request->input('email',''),
            'is_owner' => $request->input('is_owner','0'),
            'sort_key' => $request->input('sort_key',AdminUser::ID),
            'sort_direction' => $request->input('sort_direction','asc'),
            'page_unit' => $request->input('page_unit',10),
        ];

        // 管理者を検索
        $adminUsers = $this->adminUserManagement->search($conditions);

        return view('admin.admin_users.index',[
            'radioIsOwners' => $this->radioIsOwners,
            'selectSortKeys' => $this->selectSortKeys,
            'selectSorts' => $this->selectSorts,
            'selectSortNums' => $this->selectSortNums,
            'adminUsers' => $adminUsers,
            'conditions' => $conditions
        ]);
    }

}
