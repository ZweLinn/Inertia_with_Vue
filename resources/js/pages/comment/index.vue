<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head , useForm } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Comments',
        href: dashboard().url,
    },
];

defineProps({
    posts : Object
})

const form = useForm({
    body : '',
    name : '',
})

const createPost = () => {
    form.post('/comments' ,{
        preserveScroll: false,
        onSuccess : () => {
            form.reset()
        }
    });
}

</script>

<template>
    <Head title="Comments" >
        <meta name="description" content="This is comments section">
    </Head>

    <AppLayout :breadcrumbs="breadcrumbs">
        
        <h3 class="text-2xl font-bold">Comments</h3>
        <form class=" overflow-hidden shadow-sm sm:rounded-lg p-6" v-on:submit.prevent="createPost">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="5" class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" v-model="form.body  " v-on:focus="form.clearErrors()" ></textarea>
                    <div v-if="form.errors.body" class="text-red-500 text-sm mt-2">{{form.errors.body}} </div>

                    <button type="submit"
                    :disabled="form.processing"
                    :class="{ 'opacity-25': form.processing }"
                     class="mt-2 bg-gray-700 px-4 py-2 rounded-md font-medium text-white"
                     >Post</button>
            </form>
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
