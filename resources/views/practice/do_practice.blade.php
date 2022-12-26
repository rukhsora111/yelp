@extends('layouts.teaching_layouts')

@section('title', 'practicing_title')

@section('body')

<div class="my_div">      
<h1> WE ARE PRACTICING </h1>
</div>
<div class="my_div">      
<h1> {{ $practice_time }} </h1>
</div>
<div class="my_div">
   first time practice:
   <h1> {{ $practice_time1 }} </h1>
<div>
   <div class="my_div">
   second practice time:
   <h1> {{ $practice_time2 }} </h1>
<div>


@endsection