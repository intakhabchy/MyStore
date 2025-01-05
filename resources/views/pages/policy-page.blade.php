@extends('layout.app')
@section('content')
    @include('component.popup')
    @include('component.header')

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
    
    @include('component.policydescription')
    @include('component.footer')
@endsection