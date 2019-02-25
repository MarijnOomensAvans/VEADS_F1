<template>
    <div>
        <vue-bootstrap-typeahead
            :data="events"
            v-model="eventSearch"
            :serializer="s => s.name"
            placeholder="Zoek een evenement"
            @hit="selectedEvent = $event"
            ref="eventAutocomplete">

            <template v-slot:append>
                <button class="btn btn-outline-secondary" type="button" @click="addEvent">Opslaan</button>
            </template>
        </vue-bootstrap-typeahead>
    </div>
</template>

<script>
    const _ = require('underscore');
    const VueBootstrapTypeahead = require('vue-bootstrap-typeahead').default;

    export default {
        props: [
            'volunteer'
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
        methods: {
            async getEvents(query) {
                const response = await fetch('/admin/events?json=true&q=' + query);
                const suggestions = await response.json();
                this.events = suggestions.events.data;
            },

            addEvent() {
                window.location.href = '/admin/volunteers/' + this.volunteer + '/event/' + this.selectedEvent.id + '/add';
            }
        },
        watch: {
            eventSearch: _.debounce(function(event) { this.getEvents(event) }, 500)
        }
    }
</script>
