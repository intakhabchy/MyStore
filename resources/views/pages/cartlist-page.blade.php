@extends('layout.app')
@section('content')
    @include('component.header')
    @include('component.paymentMethodList')
    <script>
        (async()=>{
            try{
                await category();
                await brand();
                await policy();
            }catch (error) {
                console.error("Error in initialization:", error);
            }
        })()
    </script>
    
    @include('component.cartlistComponent')
    @include('component.footer')
@endsection