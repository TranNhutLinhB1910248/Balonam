{{-- tim kiem danh muc --}}
@extends('admin.main2')

<!-- SidebarSearch Form -->

        
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
    
@endsection



