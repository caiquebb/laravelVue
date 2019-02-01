<template>
    <div>
        <div class="form-inline">
            <a v-if="createUrl" :href="createUrl">Create</a>

            <div class="form-group pull-right">
                <input type="search" placeholder="Search" class="form-control" v-model="search">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th :key="title" v-for="title in titles">{{ title }}</th>
                    <th v-if="showUrl || editUrl || deleteUrl">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr :key="item[0]" v-for="(item, index) in list">
                    <td :key="data" v-for="data in item">{{ data }}</td>
                    <td v-if="showUrl || editUrl || deleteUrl">
                        <form :id="index" v-if="deleteUrl && csrfToekn" :action="deleteUrl" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" :value="csrfToekn">
                            
                            <a v-if="showUrl" :href="showUrl">Show |</a>
                            <a v-if="editUrl" :href="editUrl">Edit |</a>
                            <a v-if="deleteUrl" href="#" @click="submitDeleteForm(index)">Delete</a>
                        </form>

                        <span v-else>
                            <a v-if="showUrl" :href="showUrl">Show |</a>
                            <a v-if="editUrl" :href="editUrl">Edit |</a>
                            <a v-if="deleteUrl" :href="deleteUrl">Delete</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                search: ''
            }
        },

        props: [ 'titles', 'items', 'createUrl', 'showUrl', 'editUrl', 'deleteUrl', 'csrfToekn' ],

        computed: {
            list: function() {
                return this.items.filter(res => {
                    for (let i = 0; i < res.length; i++) {
                        if ((res[i] + '').toLowerCase().indexOf(this.search.toLowerCase()) >= 0) {
                            return true;
                        }
                    }

                    return false;
                });
            }
        },

        methods: {
            submitDeleteForm: function(index) {
                document.getElementById(index).submit();
            }
        }
    }
</script>
