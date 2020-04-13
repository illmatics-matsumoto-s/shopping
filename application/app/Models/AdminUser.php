<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\ColumnNameable;
use App\Models\Traits\ForwardMatchable;
use App\Models\Traits\FuzzySearchable;
use Illuminate\Support\Str;

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

    /**
     * カラム名のマッピング
     * key: 物理名
     * value: 論理名
     */
    private const COLUMN_NAMES = [
        'id' => 'ID',
        'name' => '名称',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'is_owner' => 'オーナー',
        'created_at' => '作成日時',
        'updated_at' => '更新日時',
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
     * ユーザーの役割を取得する
     *
     * @return string
     * @noinspection PhpUnused
     */
    public function getUserRoleAttribute(): string
    {
        return $this->is_owner ? 'オーナー' : '一般';
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     */
    public function __call($method, $parameters)
    {
        // 物理名取得メソッドを登録する
        if (Str::endsWith($method, 'Physical')) {
            $column = Str::before($method, 'Physical');
            return static::findPhysicalName($column);
        }

        // 論理名取得メソッドを登録する
        if (Str::endsWith($method, 'Logical')) {
            $column = Str::before($method, 'Logical');
            return static::findLogicalName($column);
        }

        return parent::__call($method, $parameters);
    }

}
