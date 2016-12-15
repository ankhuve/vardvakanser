@extends('layouts.app')

@section('content')
    <section class="m-t-2">
        <div class="container">
                <div class="panel panel-custom col-lg-6 col-lg-offset-3">
                    <div class="panel-heading">
                        <h2>
                            Registrera företag
                        </h2>
                    </div>

                    <div class="panel-body">
                            <p>
                                Du måste ha ett företagskonto för att skapa jobbannonser.
                            </p>
                            <p>
                                <a class="btn-link" href="{{ action('ContactController@create') }}">Kontakta oss</a> så löser vi det!
                            </p>
                    </div>
                </div>
        </div>
    </section>

@endsection