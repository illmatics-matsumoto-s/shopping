<?php

namespace App\Services\Domain\Admin;

use App\Models\AdminUser as AdminUser;
use App\Services\Domain\Admin\Traits\DefaultContitionGettable;

/**
 * Class AdminUserManagementService
 * @package App\Services
 *
 * 管理者管理サービス
 */
class AdminUserManagementService
{

    use DefaultContitionGettable;

    // モデル
    private $adminUser;

    // デフォルトの検索条件
    private const DEFAULT_SEARCH_CONDITIONS = [
        'sort_key' => 'id',
        'sort_direction' => 'asc',
        'page_unit' => '10'
    ];

    /**
     * AdminUserManagementService constructor.
     */
    public function __construct()
    {
        // インスタンスの生成
        $this->adminUser = new AdminUser();
    }

    /**
     * 全ての権限・オーナー・一般のラジオボタン項目を返す
     *
     */
    static function getRadioIsOwners(){
        return [
            'all' => 'すべての権限', //デフォルト
            'owner' => 'オーナー',
            'ordinary' => '一般'
        ];
    }

    /**
     * 並び替えのセレクトボックス選択項目を返す
     *
     */
    static function getSelectSortKeys(){
        return [
            AdminUser::idPhysical() => AdminUser::idLogical(),       // デフォルト
            AdminUser::namePhysical() => AdminUser::nameLogical(),
            AdminUser::emailPhysical() => AdminUser::emailLogical(),
        ];
    }

    /**
     * 並び替え方向のセレクトボックス選択項目を返す
     *
     */
    static function getSelectSorts(){
        return [
            'asc' => '昇順', //昇順 デフォルト
            'desc'=> '降順'  //降順
        ];
    }

    /**
     * 表示数のセレクトボックス選択項目を返す
     *
     */
    static function getSelectSortNums(){
        return [
            10 => 10, //デフォルト
            20 => 20,
            50 => 50,
            100=> 100,
        ];
    }
}
