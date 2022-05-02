@extends('theme::layouts.app')



@section('content')

<div>
@livewire('multistep')
</div>

@endsection

<script src="{{ asset('themes/' . $theme->folder . '/js/confetti.js') }}">
</script>
<script>
window.onunload = function() {
  Livewire.emit('customerLeaving');


}
</script>
