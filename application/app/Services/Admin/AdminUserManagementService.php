<?php

namespace App\Services\Admin;

use App\Models\AdminUser as AdminUser;

/**
 * Class AdminUserManagementService
 * @package App\Services
 *
 * 管理者管理サービス
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
     *
     * 検索
     *
     * @param array $input
     * @return null
     *
     */
    public function search(array $input = [])
    {
        $name = $input['name'];
        $mail = $input['email'];
        $is_owner = $input['is_owner'];

        $adminUsers =
            // 名称によるあいまい検索
            $this->adminUser::where(function ($query) use ($name) {
                return ($name)?
                    $query->where('name', 'like', "%$name%"):  // 名称が空でない場合
                    $query;                                    // 名称が空の場合

            })
            // メールアドレスによる前方一致検索
            ->where(function ($query) use ($mail) {
                return ($mail)?
                    $query->where('email', 'like', "$mail%"):  // メールアドレスが空でない場合
                    $query;                                   // メールアドレスが空の場合
            })
            // 権限による検索
            ->where(function ($query) use ($is_owner){
                if($is_owner == 1) {
                    $query->where('is_owner', true);       //条件の指定がある場合
                }else if($is_owner == 2){
                    $query->where('is_owner', false);      //条件の指定がある場合
                }
            })
            // ソート条件
            ->orderBy($input['sort_key'], $input['sort_direction'])
            // ページネーション
            ->paginate($input['page_unit']);

        return $adminUsers;
    }

    /**
     * 全ての権限・オーナー・一般のラジオボタン項目を返す
     *
     */
    static function getRadioIsOwners(){
        return [
            'すべての権限', //デフォルト
            'オーナー',
            '一般'
        ];
    }

    /**
     * 並び替えのセレクトボックス選択項目を返す
     *
     */
    static function getSelectSortKeys(){
        return [
            AdminUser::ID => 'ID', //デフォルト
            AdminUser::NAME => '名称',
            AdminUser::EMAIL => 'メールアドレス'
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
