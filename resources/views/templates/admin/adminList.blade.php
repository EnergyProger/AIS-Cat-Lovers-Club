@extends('templates.admin.admin_defaultList')
@section('header')
    @include('templates.admin.tableAdmin.adminSideBarTable')
@endsection

@section('content')
    @include('templates.admin.tableAdmin.adminTableContent')
@endsection