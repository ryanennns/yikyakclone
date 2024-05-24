<script setup>
import {ref} from "vue";

const props = defineProps({
    visible: {
        type: Boolean,
        required: true,
    },
});

const emit = defineEmits(['close', 'submit']);

const content = ref('');
const submit = () => {
    emit('submit', {'value': content.value});
    content.value = '';
}
</script>

<template>
    <div v-if="visible" class="modal">
        <div class="modal-content">
            <span class="close" @click="emit('close')">&times;</span>
            <textarea id="content" name="content" v-model="content"></textarea>
            <button @click="submit">Submit</button>
        </div>
    </div>
</template>

<style scoped>
#content {
    width: 100%;
    margin-bottom: 1rem;
}

.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    text-align: center;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
</style>
