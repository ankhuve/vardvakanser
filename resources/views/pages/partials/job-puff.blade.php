<div class="block block--job col-md-6" id="{{ $job->annonsid }}">
    <a href="{{ action('JobController@index', $job->annonsid) }}" >
        <div class="block-bg">
            <div class="row">
                <div class="col-xs-12">
                    <div class="block--title">
                        <h2>{{ $job->annonsrubrik }}</h2>
                    </div>

                    <div class="block--description">
                        <p>Företag: <span class="text-focus">{{ $job->arbetsplatsnamn }}</span></p>
                        <p>Arbetsort: <span class="text-focus">{{ $job->kommunnamn }}</span></p>
                    </div>
                </div>

                <div class="block--bottom col-xs-12">
                    <div title="Dagar sedan jobbet publicerades.">
                        <img class="icon--small" src="{{ asset('img/time_ago.png') }}"/>
                        <span>
                            {{ (\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:se', $job->publiceraddatum)->isSameDay(\Carbon\Carbon::today())) ? 'Publicerad idag' : ((\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:se', $job->publiceraddatum)->isSameDay(\Carbon\Carbon::yesterday())) ? 'Publicerades igår' : \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:se', $job->publiceraddatum)->startOfDay()->diffInDays(Carbon\Carbon::now()) . ' dagar sedan publicering') }}
                        </span>
                    </div>
                    <div title="Sista ansökningsdatum för jobbet.">
                        <img class="icon--small" src="{{ asset('img/calendar.png') }}"/>
                        <span>{{ array_key_exists('sista_ansokningsdag', $job) ? substr($job->sista_ansokningsdag, 0, 10) : '-' }}</span>
                    </div>
                </div>
            </div>

        </div>
    </a>
</div>