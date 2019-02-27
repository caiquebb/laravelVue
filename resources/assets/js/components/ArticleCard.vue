<template>
    <div :class="`col-sm-${sm || 6} col-md-${md || 4}`">
        <div class="thumbnail">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpXSA4xR_pWyaGoauT6wQM-BYDEpyfVtrRR0p2J9xuLh7ht1cB8w" alt="...">
            <div class="caption">
                <small>{{ publishDate | dateFormat }} - {{ author }}</small>
                <h3>{{ title }}</h3>
                <p>{{ description }}</p>
                <p><a :href="link" class="btn btn-primary" role="button">Read more</a></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [ 'title', 'description', 'link', 'image', 'publishDate', 'author', 'sm', 'md' ],

    filters: {
        dateFormat: function (value) {
            if (!value) {
                return '';
            }

            value = value.toString();

            if (value.split('-').length == 3) {
                value = value.split('-');

                return `${value[2]}/${value[1]}/${value[0]}`
            }

            return value;
        }
    }
}
</script>
