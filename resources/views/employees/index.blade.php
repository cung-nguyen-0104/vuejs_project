@extends('layouts.main')

@section('content')
<div id="app">
    <!-- component matched by the route will render here: khi dung router-view thi se k can 
    file create hay edit.blade.php: <employees-create></employees-create>... -->
    <router-view></router-view>
</div>
@endsection