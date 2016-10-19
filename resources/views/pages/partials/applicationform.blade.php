<div class="panel panel-custom p-h-2 p-v-1 m-t-2" v-if="applicationFormShowing" transition="expand">
    <div class="panel-heading m-b-1">
        <div class="row">
            <div class="col-xs-12">
                <h2>Skicka jobbansökan</h2>
                <button class="panel-heading-btn btn btn-danger right" @click="toggleApplicationForm" data-dismiss="contactForm">
                <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
        </div>
    </div>

    @if(!empty($errors->all()))
        <div class="row">
            <div class="form-group col-md-12">
                <div class="alert alert-custom" id="applicationValidationError">
                    <h4>Nu blev det lite fel!</h4>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif


    {!! Form::open(['method' => 'POST', 'url' => URL::current() . '/apply', 'class' => 'form', 'files' => true]) !!}
    {!! Form::hidden('jobTitle', $jobMatch->title ?: $jobMatch->annons->annonsrubrik) !!}

    <div class="row">
        <div class="form-group col-xs-12">
            {!! Form::label('name', 'Namn') !!}
            <span class="required"> *</span>
            {!! Form::text('name', Auth::user() ? Auth::user()->name : '', array('required', 'class'=>'form-control bordered', 'placeholder'=>'Förnamn Efternamn')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-mailadress') !!}
        <span class="required"> *</span>
        {!! Form::text('email', Auth::user() ? Auth::user()->email : '', array('required', 'class'=>'form-control bordered', 'placeholder'=>'din@email.se')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('message', 'Meddelande') !!}
        <span class="required"> *</span>
        {!! Form::textarea('message', null, array('required', 'class'=>'form-control bordered', 'placeholder'=>'Här har du möjlighet att göra en liten presentation om dig själv, och berätta varför just du skulle passa bra för det här jobbet!')) !!}
    </div>

    <div class="form-group row col-md-4">
        {!! Form::label('cv', 'CV (.doc, .docx, .pdf, .rtf, .txt, max 3MB)') !!}
        {!! Form::file('cv', array('class'=>'form-control bordered')) !!}
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {!! Form::submit('Skicka ansökan!', array('class'=>'btn btn-lg btn-secondary center-block')) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>