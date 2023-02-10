<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { capitalizeFirstLetter } from '@/mixins/helper';
</script>

<template>
    <Head :title="capitalizeFirstLetter($page.props.language.dashboard)" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ capitalizeFirstLetter($page.props.language.dashboard) }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ capitalizeFirstLetter($page.props.language.you_are_loggin) }}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
