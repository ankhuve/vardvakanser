@extends('layouts.app')

@section('content')
    <div class="container">
        @include('pages.partials.newjobconfirmation', ['job' => $data ])
    </div>

    <div class="container">

        <div class="hidden panel panel-custom col-lg-10 col-lg-offset-1">
            <div class="panel-body">
                @include('errors.validation')

                {!! Form::open(['method' => 'POST', 'action' => 'CompanyController@store', 'class'=>'form-horizontal', 'id' => 'createNewJob']) !!}

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1">
                        {!! Form::input('text', 'title', $data['title'], ['class' => 'form-control bordered input-lg text-center', 'placeholder' => 'Kökspersonal på restaurang, telefonförsäljare..']) !!}
                    </div>
                </div>

                <div class="basicJobInfoContainer">
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            {!! Form::input('text', 'type', $data['type'], ['class' => 'form-control bordered']) !!}
                        </div>

                        <div class="col-md-4">
                            {!! Form::input('text', 'work_place', $data['work_place'], ['class' => 'form-control bordered', 'placeholder' => 'Kafé Bullen, Telefontek AB..']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            {!! Form::input('text', 'county', $data['county'], ['class' => 'form-control bordered']) !!}
                        </div>

                        <div class="col-md-4">
                            {!! Form::input('text', 'municipality', $data['municipality'], ['class' => 'form-control bordered']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-md-8 col-md-offset-2">
                        {!! Form::textarea('description', $data['description'], ['class' => 'form-control bordered',
                        'id' => 'description', 'placeholder' => 'Beskriv jobbets uppgifter, förkunskaper, krav osv.']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Sista ansökningsdag</label>

                    <div class="col-md-3">
                        {!! Form::date('latest_application_date', $data['latest_application_date'], ['class' => 'form-control bordered']) !!}
                    </div>

                    <label class="col-md-2 control-label">Kontaktperson (e-mailadress)</label>

                    <div class="col-md-4">
                        {!! Form::email('contact_email', $data['contact_email'], ['class' => 'form-control bordered']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-offset-5 col-md-3 control-label">Extern ansökningslänk</label>
                    <div class="col-md-3">
                        {!! Form::text('external_link', $data['external_link'], ['class' => 'form-control bordered', 'placeholder' => 'dittföretag.se/ansök']) !!}
                    </div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>

        <div class="panel panel-custom col-lg-6 col-lg-offset-3">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h2>Ser allt bra ut?</h2>
                    </div>
                    <div class="col-xs-6">
                        {{--<a href="{{ URL::route('company.create', URL::getRequest()->request->all()) }}">--}}
                        <button class="btn btn-danger col-xs-12" onclick="window.history.go(-1);">Nej, ändra</button>
                        {{--</a>--}}
                    </div>
                    <div class="col-xs-6">
                        {!! Form::submit('Ja, Publicera', ['class' => 'btn btn-secondary col-xs-12', 'form' => 'createNewJob']) !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--<script src="/js/jquery.js"></script>--}}
    {{--<script src="js/openConfirmForm.js"></script>--}}
@endsection
