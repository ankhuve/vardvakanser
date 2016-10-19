@extends('layouts.app')

@section('content')
    <section class="m-t-2">
        <div class="container">
            <div class="panel panel-custom col-lg-10 col-lg-offset-1">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>Skapa jobbannons</h2>
                            <div class="panel-body">
                                @include('errors.validation')

                                {!! Form::open(['method' => 'POST', 'action' => 'CompanyController@confirm', 'class'=>'form-horizontal']) !!}



                                <div class="form-group">
                                    <label for="title" class="col-md-2 control-label">Jobbtitel <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        {!! Form::input('text', 'title', Request::get('title'), ['class' => 'form-control bordered input-lg', 'placeholder' => 'Kökspersonal på restaurang, telefonförsäljare..']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Län <span class="required">*</span></label>
                                    <div class="col-md-3">
                                        <select name="county" class="form-control bordered">
                                            <option value="">Välj ett län..</option>
                                            <option value="155">Norge</option>
                                            <option value="" disabled="">--------</option>

                                            <option value="10" label="Blekinge län" name="Blekinge län">Blekinge län</option>
                                            <option value="20" label="Dalarnas län" name="Dalarnas län">Dalarnas län</option>
                                            <option value="9" label="Gotlands län" name="Gotlands län">Gotlands län</option>
                                            <option value="21" label="Gävleborgs län" name="Gävleborgs län">Gävleborgs län</option>
                                            <option value="13" label="Hallands län" name="Hallands län">Hallands län</option>
                                            <option value="23" label="Jämtlands län" name="Jämtlands län">Jämtlands län</option>
                                            <option value="6" label="Jönköpings län" name="Jönköpings län">Jönköpings län</option>
                                            <option value="8" label="Kalmar län" name="Kalmar län">Kalmar län</option>
                                            <option value="7" label="Kronobergs län" name="Kronobergs län">Kronobergs län</option>
                                            <option value="25" label="Norrbottens län" name="Norrbottens län">Norrbottens län</option>
                                            <option value="12" label="Skåne län" name="Skåne län">Skåne län</option>
                                            <option value="1" label="Stockholms län" name="Stockholms län">Stockholms län</option>
                                            <option value="4" label="Södermanlands län" name="Södermanlands län">Södermanlands län</option>
                                            <option value="3" label="Uppsala län" name="Uppsala län">Uppsala län</option>
                                            <option value="17" label="Värmlands län" name="Värmlands län">Värmlands län</option>
                                            <option value="24" label="Västerbottens län" name="Västerbottens län">Västerbottens län</option>
                                            <option value="22" label="Västernorrlands län" name="Västernorrlands län">Västernorrlands län</option>
                                            <option value="19" label="Västmanlands län" name="Västmanlands län">Västmanlands län</option>
                                            <option value="14" label="Västra Götalands län" name="Västra Götalands län">Västra Götalands län</option>
                                            <option value="18" label="Örebro län" name="Örebro län">Örebro län</option>
                                            <option value="5" label="Östergötlands län" name="Östergötlands län">Östergötlands län</option>
                                            <option value="90" label="Ospecificerad arbetsort" name="Ospecificerad arbetsort">Ospecificerad arbetsort</option>
                                        </select>
                                    </div>

                                    @if (isset($searchOptions[0]))
                                        <label class="col-md-2 control-label">Yrkesgrupp <span class="required">*</span></label>
                                        <div class="col-md-4">
                                            <label class="sr-only" for="type">Yrkesgrupp</label>
                                            <select name="type" class="form-control bordered" id="type">
                                                <option class="defaultOption" value="" selected>Alla yrkesgrupper</option>

                                                @foreach($searchOptions[0]->soklista->sokdata as $option)
                                                    <option value={{ $option->id }} label='{{ $option->namn }}'
                                                            name='{{ $option->namn }}'>{{ $option->namn }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kommun <span class="required">*</span></label>
                                    <div class="col-md-3">
                                        {!! Form::input('text', 'municipality', Request::get('municipality'), ['class' => 'form-control bordered']) !!}
                                    </div>

                                    <label class="control-label col-md-2">Arbetsplats <span class="required">*</span></label>
                                    <div class="col-md-4">
                                        {!! Form::text('work_place', Request::get('work_place'), ['class' => 'form-control bordered']) !!}
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-9 col-md-offset-2">
                                        <label for="description">Beskrivning <span class="required">*</span></label>
                                        {!! Form::textarea('description', Request::get('description'), ['class' => 'form-control bordered summernote', 'id' => 'description', 'placeholder' => 'Beskriv jobbets uppgifter, förkunskaper, krav osv.']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Sista ansökan <span class="required">*</span></label>
                                    <div class="col-md-3">
                                        {!! Form::date('latest_application_date', Request::get('latest_application_date') ? : Carbon\Carbon::today()->addMonth(1), ['class' => 'form-control bordered']) !!}
                                    </div>

                                    <label class="col-md-3 control-label">Kontaktperson (email) <span class="required">*</span></label>
                                    <div class="col-md-3">
                                        {!! Form::email('contact_email', Request::get('contact_email') ? : $user->email, ['class' => 'form-control bordered']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-offset-5 col-md-3 control-label">Extern ansökningslänk</label>
                                    <div class="col-md-3">
                                        {!! Form::text('external_link', Request::get('external_link'), ['class' => 'form-control bordered', 'placeholder' => 'http://dittföretag.se/ansök']) !!}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        {!! Form::submit('Skapa', ['class' => 'btn btn-primary col-xs-12']) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
