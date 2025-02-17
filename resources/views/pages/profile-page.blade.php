@extends('layout.app')
@section('content')
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
    
    @include('component.profileComponent')
    @include('component.footer')
@endsection