@extends('layouts.app')


@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-body text-center mt-5">
                        <div class="row mb-4">
                            <h1 class="">Thank you for contacting {{ config('app.name') }} </h1>
                        </div>
                        <div class="mt-5 mb-5">
                            <h4>
                                We will contact you back soon
                            </h4>
                        </div>
                        <div class="mt-5 mb-5">
                            <button class="btn btn-sub">
                                <a style="color:#fff; text-decoration:none" href="{{ url('/') }}">
                                  Back to FitMate
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
