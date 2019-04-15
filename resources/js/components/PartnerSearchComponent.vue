<template>
    <div>
        <vue-bootstrap-typeahead
            :data="partners"
            v-model="partnerSearch"
            :serializer="s => s.name"
            placeholder="Zoek een partner"
            @hit="selectedPartner = $partner"
            ref="projectAutocomplete">

            <template v-slot:append>
                <button class="btn btn-outline-secondary" type="button" @click="removePartner"><i class="fa fa-times"></i></button>
            </template>
        </vue-bootstrap-typeahead>

        <input type="hidden" name="id" v-model="selectedPartner.id" />
    </div>
</template>

<script>
    const _ = require('underscore');
    const VueBootstrapTypeahead = require('vue-bootstrap-typeahead').default;

    export default {
        props:[
            'partner'
        ],
        components: {
            VueBootstrapTypeahead
        },
        data() {
            return {
                partners: [],
                partnerSearch: '',
                selectedPartner: {id: 0}
            }
        },
        mounted() {
            if (this.partner) {
                this.getPartner(this.partner);
            }
        },
        methods: {
            async getPartner(query) {
                const response = await fetch('/admin/partners?json=true&q=' + query);
                const suggestions = await response.json();
                this.projects = suggestions.projects.data;
            },

            async getPartner(id) {
                const response = await fetch('/admin/partners/' + id + '?json=true');
                const suggestions = await response.json();
                this.selectedProject = suggestions.project;
                this.$refs.projectAutocomplete.inputValue = suggestions.project.name;
            },

            removeProject() {
                this.selectedPartner = {id: 0};
                this.partners = [];
                this.partnerSearch = '';
                this.$refs.projectAutocomplete.inputValue = '';
            }
        },
        watch: {
            partnerSearch: _.debounce(function(project) { this.getPartner(partner) }, 500)
        }
    }
</script>
