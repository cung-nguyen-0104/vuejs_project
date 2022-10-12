@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">countries</h1>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Country') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('countries.update', $country->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-3">
                                <label for="country_code"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Country code') }}</label>

                                <div class="col-md-6">
                                    <input id="country_code" type="text"
                                        class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                                        value="{{ old('country_code', $country->country_code) }}" required autocomplete="country_code" autofocus>

                                    @error('country_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $country->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('countries.index') }}">
                                        {{ __('Back') }}
                                    </a>

                                    <button type="submit" class="ml-4 btn btn-primary">
                                        {{ __('Update country') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class='my-2 text-right'>
                    <form method="POST" action="{{ route('countries.destroy', $country->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger px-5">Delete</button>
                    </form>
                </div>
            </div>
        </div>
@endsection