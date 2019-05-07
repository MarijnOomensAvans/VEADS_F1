<template>
    <div>
        <vue-bootstrap-typeahead
            :data="events"
            v-model="eventSearch"
            :serializer="s => s.name"
            placeholder="Zoek een event"
            @hit="selectedEvent = $event"
            ref="eventAutocomplete">

            <template v-slot:append>
                <button class="btn btn-outline-secondary" type="button" @click="removeEvent"><i class="fa fa-times"></i></button>
            </template>
        </vue-bootstrap-typeahead>

        <p>Geselecteerd event: {{ selectedEvent.name }}</p>

        <input type="hidden" :name="name" v-model="selectedEvent.id" />
    </div>
</template>

<script>
    const _ = require('underscore');
    const VueBootstrapTypeahead = require('vue-bootstrap-typeahead').default;
    const axios = require('axios').default;

    export default {
        props:[
            'event',
            'position',
            'published',
            'name'
        ],
        components: {
            VueBootstrapTypeahead
        },
        data() {
            return {
                events: [],
                eventSearch: '',
                selectedEvent: {id: 0}
            }
        },
        mounted() {
            if (this.event) {
                this.getEvent(this.event);
            }
        },
        methods: {
            async getEvents(query) {
                let url = '/admin/events?json=true&q=' + query;

                if (this.published) {
                    url += "&published=" + this.published;
                }

                axios.get(url).then(response => {
                    this.events = response.data.events.data;
                });
            },

            getEvent(id) {
                axios.get('/admin/events/' + id + '?json=true').then(response => {
                    this.selectedEvent = response.data;
                    this.eventSearch = response.data.name;
                });
            },

            removeEvent() {
                this.selectedEvent = {id: 0};
                this.events = [];
                this.eventSearch = '';
                this.$refs.eventAutocomplete.inputValue = '';
            }
        },
        watch: {
            eventSearch: _.debounce(function(event) { this.getEvents(event) }, 500)
        }
    }
</script>
