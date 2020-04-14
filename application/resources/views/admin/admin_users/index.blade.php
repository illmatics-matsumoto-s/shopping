@extends('layouts.admin')

@section('content')
<div id="app">
    <form class="shadow p-3 mt-3" method="GET" action="{{ route('admin.users.search') }}">
        @csrf
        <div class="form-row">
            {{-- 名称 --}}
            <div class="col-md-6 mb-3">
                <input id="name"
                       name="name"
                       type="text"
                       class="form-control"
                       value="{{request('name')}}"
                       placeholder="{{\App\Models\AdminUser::nameLogical()}}"
                       autofocus>
            </div>
            {{-- メールアドレス --}}
            <div class="col-md-6 mb-3">
                <input id="email"
                       name="email"
                       type="text"
                       class="form-control"
                       value="{{request('email')}}"
                       placeholder="{{\App\Models\AdminUser::emailLogical()}}">
            </div>
        </div>

        {{-- 権限 --}}
        <div class="form-row">
            <div class="col-md-12 mb-3">
            @foreach ($radioIsOwners as $index => $value)
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="is-owner-{{$index}}" name="authority" @if(request('authority')==$index) checked="checked" @endif value="{{$index}}" class="custom-control-input">
                <label class="custom-control-label" for="is-owner-{{$index}}">{{$value}}</label>
            </div>
            @endforeach
            </div>
        </div>

        <div class="form-row">
            {{-- 並び替え --}}
            <div class="col-md-4 mb-3">
                <admin-search-select-box
                    id="sort_key"
                    name="sort_key"
                    placeholder-text="並び替え"
                    {{request('sort_key')}}
                    {{-- todo: デフォルト値を設定する方法を見直す --}}
                    selected-index="@if(request('sort_key')){{request('sort_key')}}@else{{\App\Services\Domain\Admin\AdminUserManagementService::findName('sort_key')}}@endif"
                    v-bind:values="{{json_encode($selectSortKeys)}}"
                >
                </admin-search-select-box>
            </div>

            {{-- 並び替え方向 --}}
            <div class="col-md-4 mb-3">
                <admin-search-select-box
                    id="sort_direction"
                    name="sort_direction"
                    placeholder-text="並び替え方向"
                    {{-- todo: デフォルト値を設定する方法を見直す --}}
                    selected-index="@if(request('sort_direction')){{request('sort_direction')}}@else{{\App\Services\Domain\Admin\AdminUserManagementService::findName('sort_direction')}}@endif"
                    v-bind:values="{{json_encode($selectSorts)}}"
                >
                </admin-search-select-box>
            </div>

            {{-- 並び替え数--}}
            <div class="col-md-2 mb-3">
                <admin-search-select-box
                    id="page_unit"
                    name="page_unit"
                    placeholder-text="表示"
                    {{-- todo: デフォルト値を設定する方法を見直す --}}
                    selected-index="@if(request('page_unit')){{request('page_unit')}}@else{{\App\Services\Domain\Admin\AdminUserManagementService::findName('page_unit')}}@endif"
                    v-bind:values="{{json_encode($selectSortNums)}}"
                >
                </admin-search-select-box>
            </div>

            {{-- 検索 --}}
            <div class="col-md-2 mb-3">
                <button class="btn btn-lg btn-primary btn-block" type="submit">検索</button>
            </div>

        </div>
    </form>

    {{-- 新規画面へのリンク --}}
    <ul class="list-group list-group-horizontal pt-2">
        <a class="btn btn-success"  href="">新規</a>
    </ul>

    {{-- 管理者一覧 --}}
    <admin-user-list
        v-bind:users="{{$adminUsers->toJson()}}"
    ></admin-user-list>
    {{$adminUsers->links()}}

</div>
@endsection
