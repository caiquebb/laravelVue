<template>
    <a v-if="type == 'link'" href="#" :class="css" data-toggle="modal" :data-target="`#${this.target}`">{{ title }}</a>
    <button v-else type="button" :class="css || 'btn btn-primary'" data-toggle="modal" :data-target="`#${this.target}`">{{ title }}</button>
</template>

<script>
export default {
    props : [ 'type', 'target', 'title', 'css' ]
}
</script>
