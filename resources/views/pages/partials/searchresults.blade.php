@if (!empty($jobs))
    <h3>Antal sökträffar: <span id="numberOfJobMatches">{{ $searchMeta['all'] }}</span></h3>
@endif

@if (!empty($jobs))
    @foreach($jobs as $job)
        @if(key_exists('annonsid', $job))
            @include('pages.partials.job-puff')
        @else
            {{--                @if((\Carbon\Carbon::now()->lte(Carbon\Carbon::parse($job->latest_application_date))))--}}
            @include('pages.partials.custom-job-puff')
            {{--@endif--}}
        @endif

    @endforeach
@else
    <div class="searchResults">

        <div id="numSearchResults">
            <h4>Inga fler jobb hittades!</h4>
        </div>

    </div>
@endif

{!! $paginator->render() !!}
