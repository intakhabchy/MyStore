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
    
    {{-- work on login component - create and add code --}}
    @include('component.registrationForm')        
    @include('component.footer')
@endsection