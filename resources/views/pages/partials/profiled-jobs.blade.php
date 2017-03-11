<div class="container m-t-2">

    <div class="slider--jobs" data-flickity='{ "cellAlign": "left", "groupCells": true, "autoPlay": 5000, "prevNextButtons": false}'>
        @foreach($profiledJobs as $profiledJob)

            @php
                $job = $profiledJob->job
            @endphp

            @include('pages.partials.profiled-job-puff')

        @endforeach
    </div>

    <div class="col-xs-12 col-md-offset-8 col-md-4">
        <div class="slider--jobs__action">
            <a href="{{ action('ContactController@create') }}">
                <button class="btn btn-primary btn-sm">
                    Vill du synas här?
                </button>
            </a>
        </div>
    </div>
</div>
