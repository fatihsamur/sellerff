@extends('theme::layouts.app')



@section('content')


@livewire('show-order',['orderId'=> $id])

@endsection
