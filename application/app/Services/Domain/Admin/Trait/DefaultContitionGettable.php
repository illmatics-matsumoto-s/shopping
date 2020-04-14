<?php

namespace App\Services\Domain\Admin\Traits;

/**
 * 画面出力する項目に対するデフォルト値を返す処理を提供する
 *
 * @package App\Models\Traits
 */
trait DefaultContitionGettable
{
    /**
     * デフォルト値を取得する
     *
     * @param string $name
     * @return string|null
     */
    public static function findName(string $name): ?string
    {
        if (!defined('static::DEFAULT_SEARCH_CONDITIONS')) {
            return null;
        }

        if (array_key_exists($name, self::DEFAULT_SEARCH_CONDITIONS)){
            return self::DEFAULT_SEARCH_CONDITIONS[$name];
        }

        return null;
    }
}
