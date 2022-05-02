@extends('theme::layouts.app')



@section('content')


@livewire('edit-order',['order_id' => $order_id])


@endsection
