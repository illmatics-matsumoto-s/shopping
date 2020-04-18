@extends('layouts.admin')

@section('content')
    {{--  todo:コンポーネント1にまとめる--}}
    <form class="shadow p-3 mt-3" method="GET" action="{{ route('admin.users.search') }}">
        @csrf
        {{--  検索入力コンポーネント --}}
        <admin-admin-search
            v-bind:request="{{ json_encode(request()->all()) }}"
        >
        </admin-admin-search>
    </form>

    {{--  todo:コンポーネント2にまとめる--}}
    {{-- 新規画面へのリンク --}}
    <ul class="list-group list-group-horizontal pt-2">
        <a class="btn btn-success"  href="">新規</a>
    </ul>

    {{--  todo:コンポーネント3にまとめる--}}
    {{--  検索結果--}}
    <admin-admin-search-user-list
        v-bind:users="{{ $adminUsers->toJson() }}"
    ></admin-admin-search-user-list>

    {{--  ページネーション --}}
    {{$adminUsers->links()}}
@endsection
