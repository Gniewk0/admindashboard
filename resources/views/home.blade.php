@extends('layouts.app')

@section('content')
<div>
    @if (Auth::user()->is_admin == 1 )
        <admin-panel></admin-panel>
    @endif
    @if ( Auth::user()->is_admin == 0 )
        <user-panel></user-panel>
    @endif
</div>
@endsection
