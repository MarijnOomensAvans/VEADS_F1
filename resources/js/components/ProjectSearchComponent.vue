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
                <button class="btn btn-outline-secondary" type="button" @click="removeProject"><i class="fa fa-times"></i></button>
            </template>
        </vue-bootstrap-typeahead>

        <input type="hidden" name="project_id" v-model="selectedProject.id" />
    </div>
</template>

<script>
    const _ = require('underscore');
    const VueBootstrapTypeahead = require('vue-bootstrap-typeahead').default;

    export default {
        props:[
            'project'
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
        mounted() {
            if (this.project) {
                this.getProject(this.project);
            }
        },
        methods: {
            async getProjects(query) {
                const response = await fetch('/admin/projects?json=true&q=' + query);
                const suggestions = await response.json();
                this.projects = suggestions.projects.data;
            },

            async getProject(id) {
                const response = await fetch('/admin/projects/' + id + '?json=true');
                const suggestions = await response.json();
                this.selectedProject = suggestions.project;
                this.$refs.projectAutocomplete.inputValue = suggestions.project.name;
            },

            removeProject() {
                this.selectedProject = {id: 0};
                this.projects = [];
                this.projectSearch = '';
                this.$refs.projectAutocomplete.inputValue = '';
            }
        },
        watch: {
            projectSearch: _.debounce(function(project) { this.getProjects(project) }, 500)
        }
    }
</script>
