<template>
    <div>
        <vue-bootstrap-typeahead
            :data="projects"
            v-model="projectSearch"
            :serializer="s => s.name"
            placeholder="Zoek een project"
            @hit="selectedProject = $event"
            ref="projectAutocomplete">

            <template v-slot:append>
                <button class="btn btn-outline-secondary" type="button" @click="addProject">Opslaan</button>
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
                projects: [],
                projectSearch: '',
                selectedProject: {id: 0}
            }
        },
        methods: {
            async getProjects(query) {
                const response = await fetch('/admin/projects?json=true&q=' + query);
                const suggestions = await response.json();
                this.projects = suggestions.projects.data;
            },

            addProject() {
                window.location.href = '/admin/volunteers/' + this.volunteer + '/project/' + this.selectedProject.id + '/add';
            }
        },
        watch: {
            projectSearch: _.debounce(function(project) { this.getProjects(project) }, 500)
        }
    }
</script>
