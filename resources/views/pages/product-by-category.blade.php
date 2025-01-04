@extends('layout.app')
@section('content')
    @include('component.popup')
    @include('component.header')

    @include('component.productByCategory')

    <script>
        (async()=>{
            await category();
            await productByCategory();
        })()
    </script>

    @include('component.footer')
@endsection