@extends('layouts.admin')

@section('content')
    <form class="shadow p-3 mt-3" method="GET" action="{{ route('admin.users.search') }}">
        @csrf
        <div class="form-row">
            {{-- 名称 --}}
            <div class="col-md-6 mb-3">
                <input id="name"
                       name="name"
                       type="text"
                       class="form-control"
                       value="{{$conditions['name']}}"
                       placeholder="{{\App\Models\AdminUser::nameLogical()}}"
                       autofocus>
            </div>
            {{-- メールアドレス --}}
            <div class="col-md-6 mb-3">
                <input id="email"
                       name="email"
                       type="text"
                       class="form-control"
                       value="{{$conditions['email']}}"
                       placeholder="{{\App\Models\AdminUser::emailLogical()}}">
            </div>
        </div>

        {{-- 権限 --}}
        <div class="form-row">
            <div class="col-md-12 mb-3">
            @foreach ($radioIsOwners as $index => $value)
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="is-owner{{$index}}" name="is_owner" @if($conditions['is_owner']==$index) checked="checked" @endif value="{{$index}}" class="custom-control-input">
                <label class="custom-control-label" for="is-owner{{$index}}">{{$value}}</label>
            </div>
            @endforeach
            </div>
        </div>

        <div class="form-row">
            {{-- 並び替え --}}
            <div class="col-md-4 mb-3">
                <select class="form-control" id="sort_key" name="sort_key">
                    @foreach ($selectSortKeys as $index => $value)
                    <option value="{{$index}}" @if($conditions['sort_key']==$index) selected="selected" @endif >並び替え:{{$value}}</option>
                    @endforeach
                </select>
            </div>

            {{-- 並び替え方向 --}}
            <div class="col-md-4 mb-3">
                <select class="form-control" id="sort_direction" name="sort_direction">
                    @foreach ($selectSorts as $index => $value)
                    <option value="{{$index}}" @if($conditions['sort_direction']==$index) selected="selected" @endif >並び替え方向:{{$value}}</option>
                    @endforeach
                </select>
            </div>

            {{-- 並び替え数--}}
            <div class="col-md-2 mb-3">
                <select class="form-control" id="page_unit" name="page_unit">
                    @foreach ($selectSortNums as $index => $value)
                    <option value="{{$index}}"@if($conditions['page_unit']==$index) selected="selected" @endif >表示:{{$value}}</option>
                    @endforeach
                </select>
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
    <div class="pt-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">名称</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">権限</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($adminUsers as $adminUser)
            <tr>
                <th>{{$adminUser->id}}</th>
                <td><a>{{$adminUser->name}}</a></td>
                <td>{{$adminUser->email}}</td>
                <td>{{$adminUser->getIsOwnerStatusAttribute()}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$adminUsers->appends($conditions)->links()}}

@endsection
