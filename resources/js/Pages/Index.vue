<script setup>
import PostCard from "@/Pages/PostCard.vue";
import CreatePostModal from "@/Pages/CreatePostModal.vue";
import {reactive, ref} from "vue";

const showModal = ref(false);
const toggleModalVisibility = () => {
    showModal.value = !showModal.value;
};

const props = defineProps({
    posts: {
        type: Object,
        required: true,
    },
});

const posts = ref(props.posts.data);

const versionsOfNothing = [
    "nothing",
    "nada",
    "nichts",
    "niente",
    "nada",
]
const noPosts = versionsOfNothing[Math.floor(Math.random() * versionsOfNothing.length)]

const createPost = (event) => {
    toggleModalVisibility();
    console.log('createPost');
    console.log(event);

    fetch('/api/posts', {
        // TODO handle CSRF
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify({
            content: event.value,
        }),
    });

    posts.value.unshift({
        content: event.value,
        comments: [],
        created_at: new Date().toISOString(),
    });
}
</script>

<template>
    <div id="wrapper">
        <div class="header">
            <h1 id="header">yakClone.</h1>
            <button id="createPost" @click=toggleModalVisibility><i class="fa-solid fa-pen"></i></button>
        </div>
        <div class="noPosts" v-if="posts.length === 0">
            <p id="nothing">{{ noPosts }}.</p>
            <p>be the first one to make a post.</p>
        </div>
        <ul>
            <li v-for="post in posts">
                <PostCard :post="post"></PostCard>
            </li>
        </ul>

        <CreatePostModal
            :visible="showModal"
            @close="toggleModalVisibility"
            @submit="createPost"
        />
    </div>
</template>

<style scoped>

#wrapper {
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

#nothing {
    font-size: 2rem;
}
</style>
