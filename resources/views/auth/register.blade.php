@extends('layouts.app')

@section('content')
    <section class="m-t-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                Registrera användare
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Namn</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control bordered" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Mailadress</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control bordered" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Lösenord</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control bordered" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Upprepa lösenord</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control bordered" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">
                                    {!! Form::label('cv', 'CV (.doc, .docx, .pdf, .rtf, .txt, max 3MB)', ['class' => 'control-label col-md-4']) !!}

                                    <div class="col-md-6">
                                        {!! Form::file('cv', array('class'=>'form-control bordered')) !!}
                                    </div>
                                    @if ($errors->has('cv'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cv') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <hr>

                                <h4 class="text-secondary">Jag är intresserad av jobb inom..</h4>

                                <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                                    {!! Form::label('county', 'Län', ['class' => 'control-label col-md-4']) !!}
                                    <div class="col-md-6">
                                        <select name="lan" class="form-control bordered" id="county" style="display: block;">
                                            <option selected disabled>------</option>
                                            <option value="155" label="Norge" name="Norge">Norge</option>
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
                                </div>

                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    {!! Form::label('category', 'Yrkesgrupp', ['class' => 'control-label col-md-4']) !!}

                                    <div class="col-md-8">
                                        <label class="sr-only" for="job-group">Yrkesgrupp</label>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2226" class="input--large">
                                                &nbsp;Ambulanssjuksköterskor m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5326" class="input--large">
                                                &nbsp;Ambulanssjukvårdare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2223" class="input--large">
                                                &nbsp;Anestesisjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2281" class="input--large">
                                                &nbsp;Apotekare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2273" class="input--large">
                                                &nbsp;Arbetsterapeuter
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2213" class="input--large">
                                                &nbsp;AT-läkare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2283" class="input--large">
                                                &nbsp;Audionomer och logopeder
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2222" class="input--large">
                                                &nbsp;Barnmorskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2232" class="input--large">
                                                &nbsp;Barnsjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5325" class="input--large">
                                                &nbsp;Barnsköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3212" class="input--large">
                                                &nbsp;Biomedicinska analytiker m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2282" class="input--large">
                                                &nbsp;Dietister
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2224" class="input--large">
                                                &nbsp;Distriktssköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3240" class="input--large">
                                                &nbsp;Djursjukskötare m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2272" class="input--large">
                                                &nbsp;Fysioterapeuter och sjukgymnaster
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2234" class="input--large">
                                                &nbsp;Företagssköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2227" class="input--large">
                                                &nbsp;Geriatriksjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2221" class="input--large">
                                                &nbsp;Grundutbildade sjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2228" class="input--large">
                                                &nbsp;Intensivvårdssjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2271" class="input--large">
                                                &nbsp;Kiropraktorer och naprapater m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2231" class="input--large">
                                                &nbsp;Operationssjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2284" class="input--large">
                                                &nbsp;Optiker
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2225" class="input--large">
                                                &nbsp;Psykiatrisjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2241" class="input--large">
                                                &nbsp;Psykologer
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2242" class="input--large">
                                                &nbsp;Psykoterapeuter
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3213" class="input--large">
                                                &nbsp;Receptarier
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2235" class="input--large">
                                                &nbsp;Röntgensjuksköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2233" class="input--large">
                                                &nbsp;Skolsköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5341" class="input--large">
                                                &nbsp;Skötare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2211" class="input--large">
                                                &nbsp;Specialistläkare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2212" class="input--large">
                                                &nbsp;ST-läkare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3250" class="input--large">
                                                &nbsp;Tandhygienister
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2260" class="input--large">
                                                &nbsp;Tandläkare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5350" class="input--large">
                                                &nbsp;Tandsköterskor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="3230" class="input--large">
                                                &nbsp;Terapeuter inom alternativmedicin
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5321" class="input--large">
                                                &nbsp;Undersköterskor, hemtjänst, äldreboende m.fl.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5323" class="input--large">
                                                &nbsp;Undersköterskor, vård- o specialavd o mottagning
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2250" class="input--large">
                                                &nbsp;Veterinärer
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5330" class="input--large">
                                                &nbsp;Vårdbiträden
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="5349" class="input--large">
                                                &nbsp;Övrig vård- och omsorgspersonal
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2219" class="input--large">
                                                &nbsp;Övriga läkare
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2289" class="input--large">
                                                &nbsp;Övriga specialister inom hälso- och sjukvård
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category[]" value="2239" class="input--large">
                                                &nbsp;Övriga specialistsjuksköterskor
                                            </label>
                                        </div>
                                    </div>

                                    {{--Om vi vill hämta kategorierna direkt från AF--}}

                                    {{--@if (isset($searchOptions[0]))--}}
                                    {{--<div class="col-md-8">--}}
                                    {{--<label class="sr-only" for="job-group">Yrkesgrupp</label>--}}

                                    {{--@foreach($searchOptions[0]->soklista->sokdata as $option)--}}
                                    {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                    {{--<input type="checkbox" name="category[]" value="{{ $option->id }}" class="input--large">--}}
                                    {{--&nbsp;{{ $option->namn }}--}}
                                    {{--</label>--}}
                                    {{--</div>--}}
                                    {{--@endforeach--}}
                                    {{--</div>--}}
                                    {{--@endif--}}

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-secondary">
                                            Registrera
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
