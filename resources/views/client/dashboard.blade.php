
@extends('layouts.admin')
@section('content')
<div class="flex">
    @include('client.components.sidebar')

    <div class="w-full flex flex-col h-screen">
        @include('client.components.header')
    </div>
</div>
@endsection