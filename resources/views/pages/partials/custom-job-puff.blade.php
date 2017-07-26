<div class="block block--job col-md-6">
    <a href="{{ action('JobController@customJob', [$job->id, str_slug($job->title)]) }}" >
        <div class="block-bg bordered">
            <div class="row">
                <div class="{{ \App\User::find($job->user_id)->logo_path ? 'col-xs-5 logo' : 'col-xs-12' }}">
                    @if(\App\User::find($job->user_id)->logo_path)
                        <div class="logo-img" style="background-image: url('{{ env("UPLOADS_URL") }}/{{ \App\User::find($job->user_id)->logo_path }}')"></div>
                    @endif
                </div>
                <div class="{{ \App\User::find($job->user_id)->logo_path ? 'col-xs-7' : 'col-xs-12' }}">

                    <div class="block--title">
                        <h2>{{ $job->title }}</h2>
                    </div>

                    <div class="block--description">
                        <p>Företag: <span class="text-focus">{{ $job->work_place }}</span></p>
                        <p>Arbetsort: <span class="text-focus">{{ $job->municipality }}</span></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="block--bottom">
                    <div title="Dagar sedan jobbet publicerades.">
                        <img class="icon--small" src="{{ asset('img/time_ago.png') }}"/>

                        <span>{{ \Carbon\Carbon::parse($job->published_at)->isSameDay(Carbon\Carbon::today()) ? 'Publicerad idag' : (\Carbon\Carbon::parse($job->published_at)->isSameDay(\Carbon\Carbon::yesterday()) ? 'Publicerades igår' : (\Carbon\Carbon::parse($job->published_at)->startOfDay()->diffInDays(\Carbon\Carbon::now()) . ' dagar sedan publicering')) }}</span>
                    </div>
                    <div title="Sista ansökningsdatum för jobbet.">
                        <img class="icon--small" src="{{ asset('img/calendar.png') }}"/>
                        <span>{{ $job->latest_application_date }}</span>
                    </div>
                </div>
            </div>

        </div>
    </a>
</div>