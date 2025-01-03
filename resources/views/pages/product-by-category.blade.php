@extends('layout.app')
@section('content')
    @include('component.popup')
    @include('component.header')

    @include('component.productByCategory')

    @include('component.footer')
@endsection