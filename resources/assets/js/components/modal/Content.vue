<template>
    <div :id="id" class="modal fade" tabindex="-1" role="dialog" :aria-labelledby="id">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [ 'id' ]
}
</script>
