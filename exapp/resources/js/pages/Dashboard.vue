<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import box1 from '../components/box1.vue';
import graph from '../components/graph.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
// State to track counts for each box1 component
const counts = reactive({
    box1: 0,
    box2: 0,
    box3: 0,
});

// Function to update counts
function updateCount(boxKey: string, newCount: number) {
    counts[boxKey] = newCount;
}
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative flex aspect-video items-center justify-center overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <box1 :count="counts.box1" @update-count="updateCount('box1', $event)" color="cyan" />
                </div>
                <div
                    class="relative flex aspect-video items-center justify-center overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <box1 :count="counts.box2" @update-count="updateCount('box2', $event)" color="blue" shape="square" />
                </div>
                <div
                    class="relative flex aspect-video items-center justify-center overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <box1 :count="counts.box3" @update-count="updateCount('box3', $event)" color="red" shape="triangle" />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <graph :counts="counts" />
            </div>
        </div>
    </AppLayout>
</template>
