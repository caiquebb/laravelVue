<template>
    <form :class="css" :action="action" :method="defineMethod" :enctype="enctype">
        <input v-if="hiddenMethod" type="hidden" name="_method" :value="hiddenMethod">
        
        <input v-if="csrfToken" type="hidden" name="_token" :value="csrfToken">

        <slot></slot>
    </form>
</template>

<script>
export default {
    data: function () {
        return {
            hiddenMethod: ''
        }
    },

    props: [ 'css', 'action', 'method', 'enctype', 'csrfToken'],

    computed: {
        defineMethod: function () {
            if (this.method.toLowerCase() != 'post' && this.method.toLowerCase() != 'get') {
                this.hiddenMethod = this.method.toLowerCase();

                return 'post';
            }
            
            return this.method.toLowerCase();
        }
    }
}
</script>
