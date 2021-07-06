@extends('templates.default')

@section('header')
    @include('templates.auth.partials.signinHeader')
@endsection

@section('content')
    @include('templates.auth.partials.signinContent')
@endsection