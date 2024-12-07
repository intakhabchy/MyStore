@extends('layout.app')
@section('content')
    @include('component.popup')
    @include('component.header')
    @include('component.heroSlider')
    
    <div class="main_content">
    @include('component.sectionBanner')
    @include('component.exclusive')
    @include('component.singleBanner')
    @include('component.featured')
    @include('component.testimonial')
    @include('component.shopInfo')
    @include('component.subscribe')
    </div>

    @include('component.footer')
@endsection