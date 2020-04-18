<?php

namespace App\Services\Domain\Admin;

use App\Http\Requests\Admin\AdminUserSearchRequest;
use App\Models\AdminUser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * 管理者ユーザー検索サービス
 *
 * @package App\Services\Domain
 */
class AdminUserManagementSearchService
{
    /**
     * @param AdminUserSearchRequest $request
     * @return LengthAwarePaginator
     */
    public function __invoke(AdminUserSearchRequest $request): LengthAwarePaginator
    {
        $query = AdminUser::fuzzySearch(AdminUser::namePhysical(), $request->name())
            ->forwardMatch(AdminUser::emailPhysical(), $request->email());

        // ToDo: ここの処理再考の余地あり
        if ($request->isExcludeOrdinary()) {
            $query = $query->where('is_owner', true);
        }
        if ($request->isExcludeOwner()) {
            $query = $query->where('is_owner', false);
        }

        return $query
            ->orderBy($request->sortKey(), $request->sortDirection())
            ->paginate($request->pageUnit())
            ->appends($request->query());
    }
}
