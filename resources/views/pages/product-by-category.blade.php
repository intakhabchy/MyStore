@extends('layout.app')
@section('content')
    @include('component.popup')
    @include('component.header')

    <script>
        (async()=>{
            await category();
        })()
    </script>
    
    @include('component.productByCategory')
    @include('component.footer')
@endsection