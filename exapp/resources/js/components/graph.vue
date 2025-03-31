<template>
    <div class="flex h-64 items-end justify-around rounded-lg bg-gray-100 p-4">
        <!-- Render a bar for each count -->
        <div v-for="(count, key) in counts" :key="key" class="w-16 bg-blue-500 text-center text-white" :style="{ height: `${count * 10}px` }">
            {{ count }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        counts: {
            type: Object,
            required: true, // Counts object is passed from the parent
        },
    },
};
</script>
