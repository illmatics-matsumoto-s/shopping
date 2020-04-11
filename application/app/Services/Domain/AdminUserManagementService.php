<?php

namespace App\Services\Domain;

use App\Models\AdminUser as AdminUser;

/**
 * Class AdminUserManagementService
 * @package App\Services
 *
 * 管理者管理サービス
 *
 *　以下レビューコメント
 * ManagementServiceだと意味が広すぎるので別の名前にすべき
 * 一人で実装しているなら100歩譲ってまだ良いかもしれないが、チーム開発になるとこのクラスは1000%肥大化する
 * 検索処理は別のサービスへ切り出したので、残りの処理はView側で行うべき。
 */
class AdminUserManagementService
{
    // モデル
    private $adminUser;

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
            'all' => 'すべての権限',
            'owner' => 'オーナー',
            'ordinary' => '一般',
        ];
    }

    /**
     * 並び替えのセレクトボックス選択項目を返す
     *
     */
    static function getSelectSortKeys(){
        return [
            AdminUser::idPhysical() => AdminUser::idLogical(),
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
            'desc'=> '降順', //降順
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
