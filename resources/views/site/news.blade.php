@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.news.index')
@endsection

@section('footer')
    @include('site.footer')
@endsection