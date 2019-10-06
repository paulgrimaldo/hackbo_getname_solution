@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Survey') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('fill_survey.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="was_attention_ok"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Was attention Ok?') }}</label>
                                <div class="col-md-6">
                                    <input id="was_attention_ok" type="checkbox"
                                           class="form-control{{ $errors->has('was_attention_ok') ? ' is-invalid' : '' }}"
                                           name="was_attention_ok" value="{{ old('was_attention_ok') }}" required
                                           autofocus>

                                    @if ($errors->has('was_attention_ok'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('was_attention_ok') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="attention_score"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Attention') }}</label>
                                <div class="col-md-6">
                                    <input id="attention_score" type="number" max="5"
                                           class="form-control{{ $errors->has('attention_score') ? ' is-invalid' : '' }}"
                                           name="attention_score" value="{{ old('attention_score') }}" required
                                           autofocus>

                                    @if ($errors->has('attention_score'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('attention_score') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="institution_score"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Institution') }}</label>
                                <div class="col-md-6">
                                    <input id="institution_score" type="number" max="5"
                                           class="form-control{{ $errors->has('institution_score') ? ' is-invalid' : '' }}"
                                           name="institution_score" value="{{ old('institution_score') }}" required
                                           autofocus>

                                    @if ($errors->has('institution_score'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('institution_score') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="process_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Process Code') }}</label>
                                <div class="col-md-6">
                                    <input id="process_id" type="number"
                                           class="form-control{{ $errors->has('process_id') ? ' is-invalid' : '' }}"
                                           name="process_id" value="{{ old('process_id') }}" required autofocus>

                                    @if ($errors->has('process_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('process_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection