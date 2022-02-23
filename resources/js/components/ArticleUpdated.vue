<template>

    <div v-if="hasUpdated">
        <p><b style="color: #ff0000">Внимание</b> на сайте изменилась статья </p>
        <p>Была изменена статья <span v-html="name"></span></p>
        <p><a v-bind:href="url">Ссылка на статью</a></p>
    </div>

</template>


<script>


export default {

    props: ['articleSlug'],
    data() {
        return {
            hasUpdated: false,
            name: [],
            url: [],
        }
    },

    mounted() {
        Echo
            .private('article')
            .listen('ArticleUpdated', (data) => {
                this.hasUpdated = true;
                console.log(data);
                this.name.push(data.article.name);
                this.url.push(data.article.slug);

            })
    },

}
</script>
