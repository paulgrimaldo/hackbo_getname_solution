@extends('layouts.app')
@section('title')
    Encuesta del servicio recibido
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2> Proceso: {{$process->id}}
                    en fecha {{$process->ticket_timestamp}}</h2>
                <form method="POST" action="{{ route('survey.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="was_attention_ok"
                               class="col-md-4 col-form-label text-md-right">{{ __('¿La atención fue buena?') }}</label>
                        <div class="col-md-6">
                            <input id="was_attention_ok" type="checkbox"
                                   class="form-check-input{{ $errors->has('was_attention_ok') ? ' is-invalid' : '' }}"
                                   name="was_attention_ok"
                                   value="1"
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
                               class="col-md-4 col-form-label text-md-right">{{ __('Califique la atención como tal') }}</label>
                        <div class="col-md-6">
                            <input id="attention_score" type="range" max="5" min="1"
                                   class="custom-range{{ $errors->has('attention_score') ? ' is-invalid' : '' }}"
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
                               class="col-md-4 col-form-label text-md-right">{{ __('Califique la institución de manera general') }}</label>
                        <div class="col-md-6">
                            <input id="institution_score" type="range" max="5" min="1"
                                   class="custom-range{{ $errors->has('institution_score') ? ' is-invalid' : '' }}"
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
                        <label for="comment"
                               class="col-md-4 col-form-label text-md-right">{{ __('Ingrese un comentario acerca de la atención recibida') }}</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="comment" id="comment">
                            </textarea>
                            @if ($errors->has('comment'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="process_id"
                               class="col-md-4 col-form-label text-md-right">{{ __('Código del proceso atendido') }}</label>
                        <div class="col-md-6">
                            <input id="process_id" type="number"
                                   class="form-control{{ $errors->has('process_id') ? ' is-invalid' : '' }}"
                                   name="process_id" value="{{$process->id}}" required autofocus>

                            @if ($errors->has('process_id'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('process_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Enviar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection