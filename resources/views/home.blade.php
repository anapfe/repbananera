 {{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}


@extends('layouts.frontLayout')

@section('css')

@endsection

@section('content')
  <section id= "content">
    @include('ajax')
  </section>
  <div class="loader-parent">
    <div class="loader">
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('js/ajax.js') }}"></script>
@endsection
