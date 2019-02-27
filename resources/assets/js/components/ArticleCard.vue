<template>
    <div :class="`col-sm-${sm || 6} col-md-${md || 4}`">
        <div class="thumbnail">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpXSA4xR_pWyaGoauT6wQM-BYDEpyfVtrRR0p2J9xuLh7ht1cB8w" alt="...">
            <div class="caption">
                <small>{{ publishDate }} - {{ author }}</small>
                <h3>{{ title }}</h3>
                <p>{{ description }}</p>
                <p><a :href="link" class="btn btn-primary" role="button">Read more</a></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [ 'title', 'description', 'link', 'image', 'publishDate', 'author', 'sm', 'md' ]
}
</script>
