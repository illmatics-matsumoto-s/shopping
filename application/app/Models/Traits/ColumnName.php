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
    public function getLogicName($name){

        if (array_key_exists($name,$this->columnLogicNames)){
            return $this->columnLogicNames[$name];
        }

        return null;
    }
}
