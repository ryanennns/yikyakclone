<script setup>
import {onMounted} from "vue";
import PostCard from "@/Pages/PostCard.vue";

const createPost = () => {
    console.log('create post');
};

const props = defineProps({
    posts: {
        type: Object,
        required: true,
    },
});

onMounted(() => {
    console.log(props.posts);
});

const versionsOfNothing = [
    "nothing",
    "nada",
    "rien",
    "nichts",
    "niente",
    "ничего",
    "niets",
    "ingenting",
    "nada",
    "아무것도",
]
const noPosts = versionsOfNothing[Math.floor(Math.random()*versionsOfNothing.length)]

</script>

<template>
    <div id="wrapper">
        <div class="header">
            <h1 id="header">yakClone.</h1>
            <button id="createPost" @click=createPost><i class="fa-solid fa-pen"></i></button>
        </div>
        <div class="noPosts" v-if="props.posts.data.length === 0">
            <p>{{noPosts}}.</p>
            <p>Be the first one to make a post.</p>
        </div>
        <ul>
            <li v-for="post in props.posts.data">
                <PostCard :post="post"></PostCard>
            </li>
        </ul>
    </div>
</template>

<style scoped>

#wrapper {
    height: 100vh;
    color: #4a4242;
    background-color: #FFFFF0;
    padding: 1rem 2rem;
}

#header {
    font-family: "Segoe UI Black", math;
    font-style: italic;
    font-size: 3rem;
    color: #CC5500;
    margin-bottom: 1rem;
    text-align: center;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

#createPost {
    width: 3rem;
    background-color: #CC5500;
    color: #FFFFF0;
    border: none;
    border-radius: 5px;
    padding: 0.5rem;
    font-size: 1rem;
}

.noPosts {
    color: #666;
    font-size: 1.3rem;
    font-style: italic;
    text-align: center;
    margin-top: 2rem;
}
</style>
