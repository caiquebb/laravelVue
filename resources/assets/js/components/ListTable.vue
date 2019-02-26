<template>
    <div>
        <div class="form-inline">
            <span v-if="createUrl">
                <vue-modal-button v-if="modal" type="link" title="Create" target="createModal"></vue-modal-button>
                <a v-else :href="createUrl">Create</a>
            </span>

            <div class="form-group pull-right">
                <input type="search" placeholder="Search" class="form-control" v-model="search">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" :key="title" v-for="(title, index) in titles" @click="sortColumn(index)">{{ title }}</th>
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
                            
                            <span v-if="showUrl">
                                <vue-modal-button v-if="modal" :item="item" :url="showUrl" type="link" title="Show |" target="showModal"></vue-modal-button>
                                <a v-else :href="showUrl">Show |</a>
                            </span>

                            <span v-if="editUrl">
                                <vue-modal-button v-if="modal" :item="item" type="link" title="Edit |" target="editModal"></vue-modal-button>
                                <a v-else :href="editUrl">Edit |</a>
                            </span>
                            
                            <a v-if="deleteUrl" href="#" @click="submitDeleteForm(index)">Delete</a>
                        </form>

                        <span v-else>
                            <span v-if="showUrl">
                                <vue-modal-button v-if="modal" :item="item" :url="showUrl" type="link" title="Show |" target="showModal"></vue-modal-button>
                                <a v-else :href="showUrl">Show |</a>
                            </span>
                            <span v-if="editUrl">
                                <vue-modal-button v-if="modal" type="link" title="Edit |" target="editModal"></vue-modal-button>
                                <a v-else :href="editUrl">Edit |</a>
                            </span>
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
                search: '',
                sortData: this.sort || 'asc',
                sortColData: this.sortCol || 0
            }
        },

        props: [ 'titles', 'items', 'createUrl', 'showUrl', 'editUrl', 'deleteUrl', 'csrfToekn', 'sort', 'sortCol', 'modal' ],

        computed: {
            list: function() {

                let sort = this.sortData;
                let sortCol = this.sortColData;

                sort = sort.toLowerCase();
                sortCol = parseInt(sortCol);
                
                if (sort == 'desc') {
                    this.items.sort(function (a, b) {
                        if (Object.values(a)[sortCol] < Object.values(b)[sortCol]) {
                            return 1;
                        } else if (Object.values(a)[sortCol] > Object.values(b)[sortCol]) {
                            return -1;
                        }
    
                        return 0;
                    });
                } else {
                    this.items.sort(function (a, b) {
                        if (Object.values(a)[sortCol] > Object.values(b)[sortCol]) {
                            return 1;
                        } else if (Object.values(a)[sortCol] < Object.values(b)[sortCol]) {
                            return -1;
                        }
                        return 0;
                    });
                }

                if (this.search) {
                    return this.items.filter(res => {
                        res = Object.values(res);
                        
                        for (let i = 0; i < res.length; i++) {
                            if ((res[i] + '').toLowerCase().indexOf(this.search.toLowerCase()) >= 0) {
                                return true;
                            }
                        }

                        return false;
                    });
                }

                return this.items;
            }
        },

        methods: {
            submitDeleteForm: function(index) {
                document.getElementById(index).submit();
            },

            sortColumn: function (column) {
                this.sortColData = column;

                if (this.sortData.toLowerCase() == 'asc') {
                    this.sortData = 'desc';
                } else {
                    this.sortData = 'asc';
                }
            }
        }
    }
</script>
