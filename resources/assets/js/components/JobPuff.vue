<template>
    <div class="block block--job col-md-6" id="{{ jobData.annonsid }}">
        <a href="{{ jobData.url }}" >
            <div class="block-bg">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="block--title">
                            <h2>{{ jobData.annonsrubrik }}</h2>
                        </div>

                        <div class="block--description">
                            <p>Företag: <span class="text-focus">{{ jobData.arbetsplatsnamn }}</span></p>
                            <p>Arbetsort: <span class="text-focus">{{ jobData.kommunnamn }}</span></p>
                        </div>
                    </div>

                    <div class="block--bottom">
                        <div title="Dagar sedan jobbet publicerades.">
                            <img class="icon--small" src="/img/time_ago.png"/>
                            <span>
                            {{ jobData.time_since_published }}
                        </span>
                        </div>
                        <div title="Sista ansökningsdatum för jobbet.">
                            <img class="icon--small" src="/img/calendar.png"/>
                            <span v-if="jobData.sista_ansokningsdag">{{ lastApplicationDay }}</span>
                            <span v-else>-</span>
                        </div>
                    </div>
                </div>

            </div>
        </a>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
            }
        },

        props: ['jobData'],

        methods: {

        },

        computed: {
            lastApplicationDay: function(){
                return this.jobData.sista_ansokningsdag.substr(0, 10);
            }
        }
    }
</script>
