@extends('theme::layouts.app')



@section('content')


@livewire('show-user',['order_id' => $order_id])


@endsection
