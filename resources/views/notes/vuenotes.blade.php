@extends('layouts.app')


@section('content')
<div id="notes">
    <notes></notes>
</div>

@endsection

@section('scripts')
@vite('resources/js/notes.js')
@endsection
