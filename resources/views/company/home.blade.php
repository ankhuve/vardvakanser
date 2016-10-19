@extends('layouts.app')

@section('content')
    <section class="m-t-2">
        <div class="container">
            <div class="panel panel-custom col-xs-12">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6 col-lg-offset-3 underlined">
                            <h2 class="text-center center-block">
                                Dina jobbannonser
                                @if(count(($user->jobs)) != 0)
                                    ( {{ count($user->jobs) }} )
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="text-center center-block text-secondary">
                                ({{ $user->email }})
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-xs-12">
                        <h4>Visar annonser {{ ($allJobs->currentPage() * $allJobs->perPage()) - ($allJobs->perPage() - 1) . " - " . ($allJobs->currentPage() === $allJobs->lastPage() ? $allJobs->total() : $allJobs->currentPage() * $allJobs->perPage()) . " av " . $allJobs->total() }}</h4>
                    </div>
                    @if($allJobs)
                        @foreach($allJobs as $job)
                            @include('pages.partials.custom-job-puff')
                        @endforeach
                        <div class="row">
                            <div class="col-xs-12">
                                {{ $allJobs->links() }}
                            </div>
                        </div>
                    @else
                        <div class="well well-custom">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Du har tyvärr inga jobbannonser.</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($user->role === 3)
                        <div class="col-md-4 col-md-offset-4">
                            <a href="{{ action('CompanyController@show') }}">
                                <button class="btn btn-secondary btn-lg btn-round col-xs-12">
                                    Skapa en annons
                                </button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
