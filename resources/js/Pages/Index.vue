<script setup>
    import {onMounted} from "vue";
    import Post from "@/Pages/Post.vue";

    const props = defineProps({
        posts: {
            type: Object,
            required: true,
        },
    });

    onMounted(() => {
        console.log(props.posts);
    });
</script>

<template>
    <div id="wrapper">
        <h1 id="header">yakClone.</h1>
        <ul>
            <li v-for="post in props.posts.data">
                <Post :post="post"></Post>
            </li>
        </ul>
    </div>
</template>

<style scoped>
    #wrapper {
        color: #4a4242;
        background-color: #FFFFF0;
        padding: 1rem 2rem;
    }

    #header {
        font-family: "Segoe UI Black",math;
        font-style: italic;
        font-size: 4rem;
        color: #CC5500;
        margin-bottom: 1rem;
        text-align: center;
    }
</style>
