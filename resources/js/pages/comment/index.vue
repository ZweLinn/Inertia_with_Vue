<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Comments',
        href: dashboard().url,
    },
];

defineProps({
    posts : Object
})


</script>

<template>
    <Head title="Comments" >
        <meta name="description" content="This is comments section">
    </Head>

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            v-for="post in posts" 
            :key="post.id"
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4 border border-gay-400 rounded-xl my-3 mx-3"
        >
            {{post.body}}
        
            <p class="font-bold text-red-300">
                {{post.user.name}}
            </p>
        </div>
    </AppLayout>
</template>
