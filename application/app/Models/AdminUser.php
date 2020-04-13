<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\ColumnNameable;
use App\Models\Traits\ForwardMatchable;
use App\Models\Traits\FuzzySearchable;

/**
 * App\Models\AdminUser
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminUser extends Authenticatable
{
    // 論理名を取得するトレイトを使用する。
    use ColumnNameable,
        ForwardMatchable,
        FuzzySearchable;

    // 定数：カラム物理名
    const ID='id';
    const NAME='name';
    const EMAIL='email';
    const PASSWORD='password';
    const IS_OWNER='is_owner';
    const CREATED_AT='created_at';
    const UPDATED_AT='updated_at';

    // 定数：カラム論理名
    private const COLUMNS_LOGIC_NAME = [
        self::ID => 'ID',
        self::NAME => '名称',
        self::EMAIL => 'メールアドレス',
        self::PASSWORD => 'パスワード',
        self::IS_OWNER => 'オーナー',
        self::CREATED_AT => '作成日時',
        self::UPDATED_AT => '更新日時',
    ];

    // カラムに格納される値と表示値の定義
    private $multiValues = [
        self::IS_OWNER => [
            true  => 'オーナー',
            false => '一般'
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_owner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * オーナ状態のステータスを取得する
     *
     * @return string
     */
    public function getIsOwnerStatusAttribute(){

        // カラムに格納される値と表示値の定義がされていない場合
        if(!$this->multiValues)
            return null;

        // IS_OWNERに格納される値と表示値の定義がされている場合、
        // オーナ情報のステータスを返す。
        if (array_key_exists($this->is_owner,$this->multiValues[self::IS_OWNER]))
            return $this->multiValues[self::IS_OWNER][$this->is_owner];

        return null;
    }

}
