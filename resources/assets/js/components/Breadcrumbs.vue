<template>
    <ol class="breadcrumb">
        <li :key="link.title" v-for="link in links">
            <a v-if="link.url" :class="defineClass" :href="link.url">{{ link.title }}</a>
            <span v-else>{{ link.title }}</span>
        </li>
    </ol>
</template>

<script>
    export default {
        props: [ 'links' ],

        computed: {
            defineClass: function () {
                if(! this.url) {
                    return "active"
                }

                return ""
            }
        }
    }
</script>
