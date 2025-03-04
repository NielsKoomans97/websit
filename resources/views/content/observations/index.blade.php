@extends('content.default')

@section('content')
    <div class="container">
        @auth
            <div class="row p-0">
                <div class="toolbar d-flex justify-content-between p-0">
                    <a class="primary mt-5 mb-3 auto-width unrounded" href="{{ route('observations.create') }}"><span>{{ __('common.Create') }}</span><i class="bi bi-plus ms-2"></i></a>
                </div>
            </div>
        @endauth
        <div class="row">
            <div class="col d-grid">
                @foreach ($observations as $observation)
                    <x-observation :observation="$observation" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
