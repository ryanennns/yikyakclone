<script setup>
const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});

const timestamp = new Date(props.post.created_at).toLocaleString();
</script>

<template>
    <div class="postWrapper">
        <p class="content">{{ props.post.content }}</p>
        <div class="footer">
            <p class="timestamp">{{ timestamp }}</p>
            <p class="comments">{{ props.post.comments.length }} comments</p>
        </div>
    </div>
</template>

<style scoped>
.postWrapper {
    background: #FFFFF9;
    border: 0.3rem solid #E2725B;
    border-radius: 5px;
    margin-bottom: 1rem;
    padding: 1rem;
}

.content {
    font-family: "Segoe UI", ui-serif;
    border-radius: 5px;
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.timestamp {
    color: #666;
    font-size: 0.8rem;
}

.comments {
    color: #666;
    font-size: 0.8rem;
}

.footer {
    display: flex;
    justify-content: space-between;
}
</style>
