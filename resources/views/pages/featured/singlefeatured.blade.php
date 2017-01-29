@extends('layouts.app')

@section('content')
    <section class="m-t-2">
        <div class="container">
            <div class="panel panel-custom col-lg-10 col-lg-offset-1">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="text-center center-block">
                                {{ $featured->title }}
                            </h1>
                        </div>
                    </div>
                    @if($featured->subtitle)
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="text-center center-block text-secondary">
                                    <i>
                                        {{ $featured->subtitle }}
                                    </i>
                                </h2>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="panel-body">
                    <div class="well well-custom p-v-2">

                        {!! $featured->description !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (isset($jobs))
        <section class="register-blocks m-t-2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center underlined text-uppercase m-b-2">
                        <h2 class="">Arbetsgivarens jobbannonser</h2>
                    </div>
                    <div class="col-xs-12">
                        @foreach($jobs as $job)
                            @include('pages.partials.custom-job-puff')
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection