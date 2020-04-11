<?php

namespace App\Http\Requests;

use App\Models\AdminUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * 管理者ユーザーの検索リクエスト
 *
 * @package App\Http\Requests
 */
class AdminUserSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|nullable',
            'email' => 'string|nullable',
            'is_owner' => Rule::in(['all', 'owner', 'ordinary']),
            'sort_key' => Rule::in(AdminUser::physicalNames()),
            'sort_direction' => Rule::in('asc', 'desc'),
            'page_unit' => 'integer',
        ];
    }

    public function name()
    {
        return $this->input('name','');
    }

    public function email()
    {
        return $this->input('email','');
    }

    public function isExcludeOwner()
    {
        return $this->input('authority', 'all') === 'ordinary';
    }

    public function isExcludeOrdinary()
    {
        return $this->input('authority', 'all') === 'owner';
    }

    public function sortKey()
    {
        return $this->input('sort_key', AdminUser::idPhysical());
    }

    public function sortDirection()
    {
        return $this->input('sort_direction','asc');
    }

    public function pageUnit()
    {
        return $this->input('page_unit',10);
    }
}
