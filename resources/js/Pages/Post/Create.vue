<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import { capitalizeFirstLetter } from '@/mixins/helper';
import NavLink from '@/Components/NavLink.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    title: '',
    description: ''
});

const submit = () => {
    form.post(route('posts.store'), {
        // onFinish: () => form.reset('password', 'password_confirmation'),
    });
};


</script>

<template>
    <Head :title="capitalizeFirstLetter($page.props.language.posts)" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ capitalizeFirstLetter($page.props.language.posts) }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3 class="text-2xl text-center"> Création de post </h3>
            </div>
            
                <form @submit.prevent="submit" class="w-2/4 margin_auto"> 
                    <div >
                        <InputLabel for="title" :value="capitalizeFirstLetter($page.props.language.title)" />

                        <TextInput
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            required
                            autofocus
                            autocomplete="title"
                        />

                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="description" :value="capitalizeFirstLetter($page.props.language.description)" />

                        <textarea 
                            id="description" rows="5" cols="33"
                            type="text"
                            class="mt-1 block w-full border-gray-300 focus:border-pink-500 focus:ring-pink-500 rounded-md shadow-sm"
                            v-model="form.description"
                            required
                            autofocus
                            autocomplete="description" 
                        >

                        </textarea>

                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            {{ capitalizeFirstLetter($page.props.language.save) }}
                        </PrimaryButton>
                    </div>
                </form>
          
        </div>
    </AuthenticatedLayout>
</template>