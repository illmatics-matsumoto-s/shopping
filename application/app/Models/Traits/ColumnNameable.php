<?php


namespace App\Models\Traits;

/**
 * Modelに対するColumnの物理名/論理名を返す処理を提供する
 *
 * @package App\Models\Traits
 */
trait ColumnNameable
{
    /**
     * 物理名を配列で取得する
     *
     * @return string[]
     */
    public static function physicalNames(): array
    {
        if (!defined('static::COLUMN_NAMES')) {
            return null;
        }

        return array_keys(self::COLUMN_NAMES);
    }

    /**
     * 論理名を配列で取得する
     *
     * @return string[]
     */
    private static function logicalNames(): array
    {
        if (!defined('static::COLUMN_NAMES')) {
            return null;
        }

        return array_values(self::COLUMN_NAMES);
    }

    /**
     * 物理名を取得する。
     *
     * @param string $columnName
     * @return string|null
     */
    private static function findPhysicalName(string $columnName): ?string
    {
        if (!defined('static::COLUMN_NAMES')) {
            return null;
        }

        if (array_key_exists($columnName, self::COLUMN_NAMES)){
            return $columnName;
        }

        return null;
    }

    /**
     * 論理名を取得する。
     *
     * @param string $columnName
     * @return string|null
     */
    private static function findLogicalName(string $columnName): ?string
    {
        if (!defined('static::COLUMN_NAMES')) {
            return null;
        }

        if (array_key_exists($columnName, self::COLUMN_NAMES)){
            return self::COLUMN_NAMES[$columnName];
        }

        return null;
    }
}
