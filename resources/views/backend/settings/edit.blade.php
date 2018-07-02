@extends('layouts.backend.app')

@section('content')

<div class="container my-5 ">
    <div class="row">
        <div class="col-12 p-4 form-div">

          @include('layouts.backend.components.alert.alert')
    
          @include('layouts.backend.components.errors')
          
          @include('backend.settings._form')

        </div>
    </div>
</div>

@endsection