<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import { capitalizeFirstLetter } from '@/mixins/helper';
import NavLink from '@/Components/NavLink.vue';


defineProps({
    posts: Object,
});

</script>

<template>
    <Head :title="capitalizeFirstLetter($page.props.language.posts)" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ capitalizeFirstLetter($page.props.language.posts) }}</h2>
        </template>

        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-2xl text-center">Liste des posts </h3>
                        <div class="float_left">
                        
                        <NavLink :href="route('posts.create')"
                          class="pt-3 px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:no-underline hover:text-blue-200"
                        >
                          {{ $page.props.language.add_post.toUpperCase() }}
                        </NavLink>
                        
                        </div>
                       
                        <Table :resource="posts" class="mt-16">
                            <template #cell(actions)="{ item: post }">
                                <div class="display-flex">
                                
                                    <a :href="`/users/${post.id}/edit`">
                                        <svg class="svg_width" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/>
                                            <path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/>
                                        </svg>
                                    </a>
                                    <a :href="`/users/${post.id}`">
                                        <svg class="svg_width" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/>
                                            <path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/>
                                        </svg>
                                    </a>
                
                                </div>
                              
                            </template>
                            
                        </Table>
                    </div>
                </div>
            </div>
          
        </div>
    </AuthenticatedLayout>
</template>