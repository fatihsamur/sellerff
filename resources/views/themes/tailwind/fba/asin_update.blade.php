@extends('theme::layouts.app')



@section('content')
    @livewire('asin-update',['id'=> $id])
@endsection
