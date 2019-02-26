<template>
    <span v-if="item">
        <a v-if="type == 'link'" @click="fillForm()" href="#" :class="css" data-toggle="modal" :data-target="`#${this.target}`">{{ title }}</a>
        <button v-else @click="fillForm()" type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="`#${this.target}`">{{ title }}</button>
    </span>
    <span v-else>
        <a v-if="type == 'link'" href="#" :class="css" data-toggle="modal" :data-target="`#${this.target}`">{{ title }}</a>
        <button v-else type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="`#${this.target}`">{{ title }}</button>
    </span>
</template>

<script>
export default {
    props : [ 'type', 'target', 'title', 'css', 'item' ],
    methods: {
        fillForm: function () {
            this.$store.commit('setItem', this.item);
        }
    }
}
</script>
