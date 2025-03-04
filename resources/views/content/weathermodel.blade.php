@extends('content.default')

@section('content')
<div class="container">
    <div class="row">
        <livewire:weather-model-viewer />
    </div>
</div>
@endsection

@push('scripts')

@endpush