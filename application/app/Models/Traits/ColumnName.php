<?php


namespace App\Models\Traits;

/**
 * モデルの各名称を返すトレイト
 *
 * Trait ColumnName
 * @package App\Models\Traits
 */
trait ColumnName
{
    /**
     *
     * 論理名を取得します。
     *
     * @param $name
     * @return |null
     */
    static function getLogicName($name){

        if (array_key_exists($name,self::COLUMNS_LOGIC_NAME)){
            return self::COLUMNS_LOGIC_NAME[$name];
        }

        return null;
    }
}
