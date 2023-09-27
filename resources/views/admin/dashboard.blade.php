
@extends('layouts.admin')
@section('content')
<div class="flex">
    @include('admin.components.sidebar')

    <div class="w-full flex flex-col h-screen">
        @include('admin.components.header')
    </div>
</div>
@endsection