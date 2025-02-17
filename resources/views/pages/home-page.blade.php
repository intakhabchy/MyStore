@extends('layout.app')
@section('content')
    {{-- @include('component.popup') --}}
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
        (async () => {
            try {
                await category();
                await brand();
                await Hero();
                await newArrival();
                await bestSeller();
                await featured();
                await specialOffer();
                await policy();
            } catch (error) {
                console.error("Error in initialization:", error);
            }
        })();
    </script>

    </div>

    @include('component.footer')
@endsection