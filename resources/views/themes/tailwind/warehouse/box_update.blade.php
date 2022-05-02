@extends('theme::layouts.app')
@section('content')


@livewire('box-update' , ['order_id' => $order_id])


@endsection
