@extends('layouts.app')
@section('content')
    <section class="search-field white-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-2">
                    <h1>Hitta jobb</h1>
                </div>
                <div class="col-xs-12 col-md-9 col-lg-10">
                    <div class="row">
                        <div class="form-inline">
                            {!! Form::open(array('url' => action('SearchController@index'), 'method' => 'get')) !!}

                            {{--Sökfält--}}
                            <div class="col-md-12">
                                <div class="input-group input-group-full">
                                    <label class="sr-only" for="keyword">Sökord</label>
                                    {!! Form::text('q', '', array('class'=>'form-control form-input', 'placeholder'=>'Barnmorska, psykolog, sjuksköterska..',
                                    'autofocus'=>'autofocus', 'id' => 'keyword')) !!}

                                    <label class="sr-only" for="submit">Skicka sökning</label>
                                    <span class="input-group-btn">
                                        {!! Form::submit('Sök', array('class'=>'form-input form-input--btn btn btn-primary', 'onsubmit' =>
                                        'setSearchParameters()', 'id' => 'submit')) !!}
                                    </span>
                                </div>
                                <div class="input-label--subtitle">(jobbtitel, nyckelord, företag)</div>
                            </div>
                            {{--Slut sökfält--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="search-results">
        <div class="container-fluid">
            <aside class="filters">
                <div class="container-fluid">

                    <h4>Förfina sökning</h4>

                    <div class="input-group input-group-full">
                        <label class="sr-only" for="county">Län</label>
                        <select name="lan" class="form-input" id="county" style="display: block;">
                            <option value="" class="defaultOption" selected>Alla län</option>
                            <option {{ $request->get('lan') === "155" ? "selected" : "" }} value="155" label="Norge" name="Norge">Norge</option>
                            <option disabled>------</option>
                            <option {{ $request->get('lan') === "10" ? "selected" : "" }} value="10" label="Blekinge län" name="Blekinge län">Blekinge län</option>
                            <option {{ $request->get('lan') === "20" ? "selected" : "" }} value="20" label="Dalarnas län" name="Dalarnas län">Dalarnas län</option>
                            <option {{ $request->get('lan') === "9" ? "selected" : "" }} value="9" label="Gotlands län" name="Gotlands län">Gotlands län</option>
                            <option {{ $request->get('lan') === "21" ? "selected" : "" }} value="21" label="Gävleborgs län" name="Gävleborgs län">Gävleborgs län</option>
                            <option {{ $request->get('lan') === "13" ? "selected" : "" }} value="13" label="Hallands län" name="Hallands län">Hallands län</option>
                            <option {{ $request->get('lan') === "23" ? "selected" : "" }} value="23" label="Jämtlands län" name="Jämtlands län">Jämtlands län</option>
                            <option {{ $request->get('lan') === "6" ? "selected" : "" }} value="6" label="Jönköpings län" name="Jönköpings län">Jönköpings län</option>
                            <option {{ $request->get('lan') === "8" ? "selected" : "" }} value="8" label="Kalmar län" name="Kalmar län">Kalmar län</option>
                            <option {{ $request->get('lan') === "7" ? "selected" : "" }} value="7" label="Kronobergs län" name="Kronobergs län">Kronobergs län</option>
                            <option {{ $request->get('lan') === "25" ? "selected" : "" }} value="25" label="Norrbottens län" name="Norrbottens län">Norrbottens län</option>
                            <option {{ $request->get('lan') === "12" ? "selected" : "" }} value="12" label="Skåne län" name="Skåne län">Skåne län</option>
                            <option {{ $request->get('lan') === "1" ? "selected" : "" }} value="1" label="Stockholms län" name="Stockholms län">Stockholms län</option>
                            <option {{ $request->get('lan') === "4" ? "selected" : "" }} value="4" label="Södermanlands län" name="Södermanlands län">Södermanlands län</option>
                            <option {{ $request->get('lan') === "3" ? "selected" : "" }} value="3" label="Uppsala län" name="Uppsala län">Uppsala län</option>
                            <option {{ $request->get('lan') === "17" ? "selected" : "" }} value="17" label="Värmlands län" name="Värmlands län">Värmlands län</option>
                            <option {{ $request->get('lan') === "24" ? "selected" : "" }} value="24" label="Västerbottens län" name="Västerbottens län">Västerbottens län</option>
                            <option {{ $request->get('lan') === "22" ? "selected" : "" }} value="22" label="Västernorrlands län" name="Västernorrlands län">Västernorrlands län</option>
                            <option {{ $request->get('lan') === "19" ? "selected" : "" }} value="19" label="Västmanlands län" name="Västmanlands län">Västmanlands län</option>
                            <option {{ $request->get('lan') === "14" ? "selected" : "" }} value="14" label="Västra Götalands län" name="Västra Götalands län">Västra Götalands län</option>
                            <option {{ $request->get('lan') === "18" ? "selected" : "" }} value="18" label="Örebro län" name="Örebro län">Örebro län</option>
                            <option {{ $request->get('lan') === "5" ? "selected" : "" }} value="5" label="Östergötlands län" name="Östergötlands län">Östergötlands län</option>
                            <option {{ $request->get('lan') === "90" ? "selected" : "" }} value="90" label="Ospecificerad arbetsort" name="Ospecificerad arbetsort">Ospecificerad arbetsort</option>
                        </select>
                    </div>
                    <select name="{{ config('app.af_type_name_minor') }}" class="form-input" id="job-group">
                        <option {{ $request->get(config("app.af_type_name_minor")) === "" ? 'selected' : '' }} class="defaultOption" value="">Alla yrkesgrupper</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2213" ? 'selected' : '' }} value="2213" label="AT-läkare" name="AT-läkare">AT-läkare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2226" ? 'selected' : '' }} value="2226" label="Ambulanssjuksköterskor m.fl." name="Ambulanssjuksköterskor m.fl.">Ambulanssjuksköterskor m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5326" ? 'selected' : '' }} value="5326" label="Ambulanssjukvårdare" name="Ambulanssjukvårdare">Ambulanssjukvårdare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2223" ? 'selected' : '' }} value="2223" label="Anestesisjuksköterskor" name="Anestesisjuksköterskor">Anestesisjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2281" ? 'selected' : '' }} value="2281" label="Apotekare" name="Apotekare">Apotekare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2273" ? 'selected' : '' }} value="2273" label="Arbetsterapeuter" name="Arbetsterapeuter">Arbetsterapeuter</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2283" ? 'selected' : '' }} value="2283" label="Audionomer och logopeder" name="Audionomer och logopeder">Audionomer och logopeder</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2222" ? 'selected' : '' }} value="2222" label="Barnmorskor" name="Barnmorskor">Barnmorskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2232" ? 'selected' : '' }} value="2232" label="Barnsjuksköterskor" name="Barnsjuksköterskor">Barnsjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5325" ? 'selected' : '' }} value="5325" label="Barnsköterskor" name="Barnsköterskor">Barnsköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3212" ? 'selected' : '' }} value="3212" label="Biomedicinska analytiker m.fl." name="Biomedicinska analytiker m.fl.">Biomedicinska analytiker m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2282" ? 'selected' : '' }} value="2282" label="Dietister" name="Dietister">Dietister</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2224" ? 'selected' : '' }} value="2224" label="Distriktssköterskor" name="Distriktssköterskor">Distriktssköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3240" ? 'selected' : '' }} value="3240" label="Djursjukskötare m.fl." name="Djursjukskötare m.fl.">Djursjukskötare m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2272" ? 'selected' : '' }} value="2272" label="Fysioterapeuter och sjukgymnaster" name="Fysioterapeuter och sjukgymnaster">Fysioterapeuter och sjukgymnaster</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2234" ? 'selected' : '' }} value="2234" label="Företagssköterskor" name="Företagssköterskor">Företagssköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2227" ? 'selected' : '' }} value="2227" label="Geriatriksjuksköterskor" name="Geriatriksjuksköterskor">Geriatriksjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2221" ? 'selected' : '' }} value="2221" label="Grundutbildade sjuksköterskor" name="Grundutbildade sjuksköterskor">Grundutbildade sjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2228" ? 'selected' : '' }} value="2228" label="Intensivvårdssjuksköterskor" name="Intensivvårdssjuksköterskor">Intensivvårdssjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2271" ? 'selected' : '' }} value="2271" label="Kiropraktorer och naprapater m.fl." name="Kiropraktorer och naprapater m.fl.">Kiropraktorer och naprapater m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2231" ? 'selected' : '' }} value="2231" label="Operationssjuksköterskor" name="Operationssjuksköterskor">Operationssjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2284" ? 'selected' : '' }} value="2284" label="Optiker" name="Optiker">Optiker</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2225" ? 'selected' : '' }} value="2225" label="Psykiatrisjuksköterskor" name="Psykiatrisjuksköterskor">Psykiatrisjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2241" ? 'selected' : '' }} value="2241" label="Psykologer" name="Psykologer">Psykologer</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2242" ? 'selected' : '' }} value="2242" label="Psykoterapeuter" name="Psykoterapeuter">Psykoterapeuter</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3213" ? 'selected' : '' }} value="3213" label="Receptarier" name="Receptarier">Receptarier</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2235" ? 'selected' : '' }} value="2235" label="Röntgensjuksköterskor" name="Röntgensjuksköterskor">Röntgensjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2212" ? 'selected' : '' }} value="2212" label="ST-läkare" name="ST-läkare">ST-läkare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2233" ? 'selected' : '' }} value="2233" label="Skolsköterskor" name="Skolsköterskor">Skolsköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5341" ? 'selected' : '' }} value="5341" label="Skötare" name="Skötare">Skötare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "9000" ? 'selected' : '' }} value="9000" label="Socialsekreterare" name="Socialsekreterare">Socialsekreterare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2211" ? 'selected' : '' }} value="2211" label="Specialistläkare" name="Specialistläkare">Specialistläkare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3250" ? 'selected' : '' }} value="3250" label="Tandhygienister" name="Tandhygienister">Tandhygienister</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2260" ? 'selected' : '' }} value="2260" label="Tandläkare" name="Tandläkare">Tandläkare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5350" ? 'selected' : '' }} value="5350" label="Tandsköterskor" name="Tandsköterskor">Tandsköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "3230" ? 'selected' : '' }} value="3230" label="Terapeuter inom alternativmedicin" name="Terapeuter inom alternativmedicin">Terapeuter inom alternativmedicin</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5321" ? 'selected' : '' }} value="5321" label="Undersköterskor, hemtjänst, äldreboende m.fl." name="Undersköterskor, hemtjänst, äldreboende m.fl.">Undersköterskor, hemtjänst, äldreboende m.fl.</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5323" ? 'selected' : '' }} value="5323" label="Undersköterskor, vård- o specialavd o mottagning" name="Undersköterskor, vård- o specialavd o mottagning">Undersköterskor, vård- o specialavd o mottagning</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2250" ? 'selected' : '' }} value="2250" label="Veterinärer" name="Veterinärer">Veterinärer</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5330" ? 'selected' : '' }} value="5330" label="Vårdbiträden" name="Vårdbiträden">Vårdbiträden</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "5349" ? 'selected' : '' }} value="5349" label="Övrig vård- och omsorgspersonal" name="Övrig vård- och omsorgspersonal">Övrig vård- och omsorgspersonal</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2219" ? 'selected' : '' }} value="2219" label="Övriga läkare" name="Övriga läkare">Övriga läkare</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2289" ? 'selected' : '' }} value="2289" label="Övriga specialister inom hälso- och sjukvård" name="Övriga specialister inom hälso- och sjukvård">Övriga specialister inom hälso- och sjukvård</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "2239" ? 'selected' : '' }} value="2239" label="Övriga specialistsjuksköterskor" name="Övriga specialistsjuksköterskor">Övriga specialistsjuksköterskor</option>
                        <option {{ $request->get(config("app.af_type_name_minor")) === "9001" ? 'selected' : '' }} value="9001" label="Övrigt" name="Övrigt">Övrigt</option>
                    </select>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="input-group input-group-full">
                                <label class="sr-only" for="submit">Filtrera sökning</label>
                                {!! Form::submit('Filtrera', array('class'=>'form-input form-input--btn btn btn-primary', 'onsubmit' =>
                                'setSearchParameters()', 'id' => 'submit')) !!}
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="input-group input-group-full">
                                <label class="sr-only" for="submit">Återställ filtrering</label>
                                <button title="Återställ filtrering" class="form-input form-input--btn btn btn-danger" id="reset" type="button" @click="resetSearchFilters()"><span class="glyphicon glyphicon-repeat"></span></button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </aside>

            <div class="results-wrapper">
                <search-results></search-results>
            </div>
        </div>

    </section>
@endsection