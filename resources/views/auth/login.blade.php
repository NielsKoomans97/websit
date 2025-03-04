@extends('content.default')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="fw-bolder m-0">{{ __('common.Login') }}</h6>
                    </div>
                    <div class="card-body p-4">
                        <form class="d-flex flex-column login-form" action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    <b>
                                        {{ __('common.Email') }}
                                    </b>
                                </label>
                                <input class="form-control" name="email" id="email" type="text">
                                @error('email')
                                    <label class="form-label text-warning">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    <b>
                                        {{ __('common.Password') }}
                                    </b>
                                </label>
                                <input class="form-control" name="password" id="password" type="password">
                                @error('password')
                                    <label class="form-label text-warning">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="mt-3 d-flex justify-content-end">
                                <button class="primary" type="submit"><span>{{ __('common.Login') }}</span><i
                                        class="bi bi-shield-lock ms-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
