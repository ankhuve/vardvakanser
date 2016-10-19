@extends('layouts.app')

@section('title', config('app.name', 'Vårdvakanser') . " | " . $jobMatch->annons->annonsrubrik)
@section('meta-description', $jobMatch->annons->annonsrubrik . " | " . $jobMatch->arbetsplats->arbetsplatsnamn)

@section('og-title', $jobMatch->annons->annonsrubrik)
@section('og-description', (strlen(strip_tags($jobMatch->annons->annonstext))<200) ? strip_tags($jobMatch->annons->annonstext) : substr(strip_tags($jobMatch->annons->annonstext), 0, 200)." ...")



@section('content')

    <section class="m-t-2">
        <div class="container">

            @if(Session::has('contactError'))
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="alert alert-custom">
                            {!! Session::get('contactError') !!}
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('message'))
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="alert alert-success">
                            {!! Session::get('message') !!}
                        </div>
                    </div>
                </div>
            @endif

            <div class="panel panel-custom col-lg-10 col-lg-offset-1">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="text-center center-block">
                                {{ $jobMatch->annons->annonsrubrik }}
                            </h1>
                            <a href="{{ URL::previous() }}">
                                <button class="panel-heading-btn btn btn-danger left">
                                    <span class="glyphicon glyphicon-triangle-left"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="text-center center-block text-secondary">
                                <i>
                                    @if(property_exists($jobMatch->arbetsplats, 'hemsida'))
                                        <a href={{ $jobMatch->arbetsplats->hemsida }}>
                                            {{ $jobMatch->arbetsplats->arbetsplatsnamn }}
                                        </a>
                                    @else
                                        {{ $jobMatch->arbetsplats->arbetsplatsnamn }}
                                    @endif
                                </i>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="well well-custom">
                        <p style="white-space: pre-line">
                            {{ $jobMatch->annons->annonstext }}
                        </p>
                    </div>
                    <div class="share-buttons text-right">
                        <h4>Dela jobbannons:
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ env('APP_ENV') === "local" ? env('APP_URL') : URL::current() }}" target="_blank">
                                <img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn" />
                            </a>
                            <a href="http://www.facebook.com/sharer.php?u={{ env('APP_ENV') === "local" ? env('APP_URL') : URL::current() }}" target="_blank">
                                <img src="{{ asset('img/facebook.png') }}" alt="Facebook" />
                            </a>
                        </h4>
                    </div>
                </div>


                <div class="row">
                    <div class="panel-footer">
                        <p> Varaktighet:  {{ $jobMatch->villkor->varaktighet }}</p>
                        <p> Kommun:  {{ $jobMatch->annons->kommunnamn }}</p>
                        <p> Publicerad: {{ date('d-m-Y', strtotime($jobMatch->annons->publiceraddatum)) }}</p>
                        <p> Dagar sedan publicering: {{ $daysSincePublished }}</p>
                        @if(isset($jobMatch->ansokan->sista_ansokningsdag))
                            <hr>
                            <p>Sista ansökningsdag {{ substr($jobMatch->ansokan->sista_ansokningsdag, 0, 10) }}</p>
                        @endif
                        <h4 class="text-center m-v-2 text-secondary">Kom ihåg att ange {{ config('app.name', 'Vårdvakanser') }} som referens vid ansökan!</h4>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                @if(isset($jobMatch->annons->platsannonsUrl))
                                    <a target="_blank" href="{{ $jobMatch->annons->platsannonsUrl }}">
                                        <button class="btn btn-lg btn-secondary btn-round center-block">Ansök</button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection