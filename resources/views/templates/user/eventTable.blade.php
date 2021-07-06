@extends('templates.user.default_user')

@section('sidebar')
    @include('templates.user.partials.sidebar')
@endsection

@section('content')
    @include('templates.user.partials.contentEventTable')
@endsection