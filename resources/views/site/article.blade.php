@extends('layouts.site')

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.articles.show')
@endsection

@section('footer')
    @include('site.footer')
@endsection