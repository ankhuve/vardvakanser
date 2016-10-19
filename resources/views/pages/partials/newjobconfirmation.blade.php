<div class="panel panel-custom col-lg-10 col-lg-offset-1 m-t-2">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center center-block">
                    {{ $data['title'] }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center center-block text-secondary">
                    <i>
                        {{ $data['work_place'] }}
                    </i>
                </h2>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="well well-custom">
            @if(Auth::user()->logo_path)
                <div class="row">
                    <div class="logo col-xs-12" >
                        <div class="logo logo-img logo-job" style="background-image: url('{{ env("UPLOADS_URL") }}/{{ Auth::user()->logo_path }}')"></div>
                    </div>
                </div>
            @endif

            <p style="white-space: pre-line">
                {!! $data['description'] !!}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="panel-footer">
            <p> Kommun:  {{ $data['municipality'] }}</p>
            <p> Publicerad: Idag</p>
            {{--<p> Dagar sedan publicering: {{ $daysSincePublished }}</p>--}}
            @if(isset($data['latest_application_date']))
                <hr>
                <p>Sista ansökningsdag {{ $data['latest_application_date'] }}</p>
            @endif
        </div>
    </div>
</div>