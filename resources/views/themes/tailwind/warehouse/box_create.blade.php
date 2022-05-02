@extends('theme::layouts.app')
@section('content')


@livewire('box-create' , ['order_id' => $order_id])


@endsection
