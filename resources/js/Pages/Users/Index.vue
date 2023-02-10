<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import { capitalizeFirstLetter } from "@/mixins/helper";

// defineProps(["users"]);
defineProps({
    users: Object,
});
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-2xl text-center">Laravel 9 Inertia JS Datatable</h3>
                        <Table :resource="users">
                            <template #cell(actions)="{ item: user }">
                                <div class="display-flex">
                                
                                    <a :href="`/users/${user.id}/edit`">
                                        <svg class="svg_width" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/>
                                            <path d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z"/>
                                        </svg>
                                    </a>
                                    <a :href="`/users/${user.id}`">
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
            <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Table  :meta="users">
                            <template #head>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                            </template>

                            <template #body>
                                <tr
                                    v-for="(user, key) in users.data"
                                    :key="key"
                                >
                                    <td>{{ user.firstname }}</td>
                                    <td>{{ user.lastname }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.created_at }}</td>
                                    <td>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="48"
                                            width="48"
                                        >
                                            <path
                                                d="M13.05 42q-1.25 0-2.125-.875T10.05 39V10.5H8v-3h9.4V6h13.2v1.5H40v3h-2.05V39q0 1.2-.9 2.1-.9.9-2.1.9Zm21.9-31.5h-21.9V39h21.9Zm-16.6 24.2h3V14.75h-3Zm8.3 0h3V14.75h-3Zm-13.6-24.2V39Z"
                                            />
                                        </svg>
                                    </td>
                                </tr>
                            </template>
                        </Table>
                    </div>
                </div>
            </div> -->
        </div>
    </AuthenticatedLayout>
</template>
