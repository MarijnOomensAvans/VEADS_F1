<template>
    <div>
        <vue-bootstrap-typeahead
            :data="partners"
            v-model="partnerSearch"
            :serializer="s => s.name"
            placeholder="Zoek een partner"
            @hit="selectedPartner = $event"
            ref="partnerAutoComplete">

            <template v-slot:append>
                <button class="btn btn-outline-secondary" type="button" @click="removePartner"><i class="fa fa-times"></i></button>
            </template>
        </vue-bootstrap-typeahead>

        <input type="hidden" :name="name" v-model="selectedPartner.id" />
    </div>
</template>

<script>
    const _ = require('underscore');
    const VueBootstrapTypeahead = require('vue-bootstrap-typeahead').default;
    const axios = require('axios').default;

    export default {
        props:[
            'partner',
            'name',
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
             getPartners(query) {
                let url = '/admin/partners?json=true&q=' + query;

                axios.get(url).then(response => {
                    this.partners = response.data.partners.data;
                });
            },

            getPartner(id) {
                axios.get('/admin/partners/' + id + '?json=true').then(response => {
                    this.selectedPartner = response.data;
                });
            },

            removePartner() {
                this.selectedPartner = {id: 0};
                this.partners = [];
                this.partnerSearch = '';
                this.$refs.partnerAutoComplete.inputValue = '';
            }
        },
        watch: {
            partnerSearch: _.debounce(function(partner) { this.getPartners(partner) }, 500)
        }
    }
</script>
