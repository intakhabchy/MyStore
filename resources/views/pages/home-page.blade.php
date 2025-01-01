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

    <script>
        (async()=>{
            await category();
            await Hero();

            await newArrival();
            await bestSeller();
            await featured();
            await specialOffer();
        })()
    </script>

    </div>

    @include('component.footer')
@endsection