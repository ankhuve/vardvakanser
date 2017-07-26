<template>
    <div v-show="jobData" class="block block--job col-md-6">
        <a href="{{ jobData.url }}" >
            <div class="block-bg bordered">
                <div class="row">
                    <div class="{{ jobData.logo_path ? 'col-xs-5 logo' : 'col-xs-12' }}">
                        <div class="logo-img" v-show="jobData.logo_path" v-bind:style="{ backgroundImage: 'url(' + jobData.logo_path + ')'}"></div>
                    </div>
                    <div class="{{ jobData.logo_path ? 'col-xs-7' : 'col-xs-12' }}">

                        <div class="block--title">
                            <h2>{{ jobData.title }}</h2>
                        </div>

                        <div class="block--description">
                            <p>Företag: <span class="text-focus">{{ jobData.work_place }}</span></p>
                            <p>Arbetsort: <span class="text-focus">{{ jobData.municipality }}</span></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="block--bottom">
                        <div title="Dagar sedan jobbet publicerades.">
                            <img class="icon--small" src="/img/time_ago.png"/>

                            <span>{{ jobData.time_since_published }}</span>
                        </div>
                        <div title="Sista ansökningsdatum för jobbet.">
                            <img class="icon--small" src="/img/calendar.png"/>
                            <span>{{ jobData.latest_application_date }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </a>
    </div>
</template>

<script>
    export default {
        created() {
//            console.log(this.jobData);
        },

        data: function() {
            return {
            }
        },

        props: ['jobData'],

        methods: {
            setBackgroundUrl: function(){
                console.log('fetching jobsObj...');
            }
        }
    }
</script>
