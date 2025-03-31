<template>
    <div class="items-center justify-center text-center">
        <button
            :class="[`h-40 w-40 text-6xl font-bold text-white focus:outline-none focus:ring-2`, colorClass, shapeClass, hoverClass]"
            @click="incrementCount"
        >
            {{ count }}
        </button>
    </div>
</template>

<script>
export default {
    props: {
        count: {
            type: Number,
            required: true, // Count is passed from the parent
        },
        shape: {
            type: String,
            default: 'circle', // Default shape is circle
        },
    },
    methods: {
        incrementCount() {
            const newCount = this.count + 1;
            this.$emit('update-count', newCount); // Emit the updated count to the parent
        },
    },
    computed: {
        colorClass() {
            // Dynamically set the background color based the count
            let className = '';
            if (this.count >= 0 && this.count <= 3) {
                className = 'bg-green-500';
            } else if (this.count >= 4 && this.count <= 7) {
                className = 'bg-blue-500';
            } else if (this.count >= 8 && this.count <= 15) {
                className = 'bg-yellow-500';
            } else if (this.count > 15) {
                className = 'bg-red-500';
            }
            console.log('Generated color class:', className); // Debugging
            return className;
        },
        hoverClass() {
            // Dynamically set the hover color based on co
            const baseColor = this.colorClass.replace('bg-', '').replace('-500', '');
            return `hover:bg-${baseColor}-700`;
        },

        shapeClass() {
            // Dynamically set the shape based on the `shape` prop
            if (this.shape === 'circle') return 'rounded-full';
            if (this.shape === 'square') return 'rounded-none';
            if (this.shape === 'triangle') return 'clip-path-triangle'; // Custom shape
            return ''; // Default to no additional shape class
        },
    },
};
</script>

<style>
/* Add a custom shape for triangle */
.clip-path-triangle {
    clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
}
</style>
