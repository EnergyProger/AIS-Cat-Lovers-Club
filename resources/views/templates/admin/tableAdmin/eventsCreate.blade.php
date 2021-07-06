@extends('templates.admin.default_admin')

@section('header')
    @include('templates.admin.tableAdmin.adminSideBarTable')
@endsection

@section('content')
    @include('templates.admin.tableAdmin.partials.addNewEvent')
@endsection