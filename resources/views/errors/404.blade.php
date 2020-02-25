@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')

    @include('errors.404_content')
@endsection

@section('footer')
    @include('site.footer')
@endsection