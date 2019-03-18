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

        <input type="hidden" :name="'position[' + position + ']'" v-model="selectedEvent.id" />
    </div>
</template>

<script>
    const _ = require('underscore');
    const VueBootstrapTypeahead = require('vue-bootstrap-typeahead').default;

    export default {
        props:[
            'event',
            'position',
            'published'
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

                const response = await fetch(url);
                const suggestions = await response.json();
                this.events = suggestions.events.data;
            },

            async getEvent(id) {
                const response = await fetch('/admin/events/' + id + '?json=true');
                const suggestions = await response.json();
                this.selectedevent = suggestions.event;
                this.$refs.eventAutocomplete.inputValue = suggestions.event.name;
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
