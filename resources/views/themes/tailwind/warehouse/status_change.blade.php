@extends('theme::layouts.app')



@section('content')


@livewire('status-change',['order_id' => $order_id])


@endsection
