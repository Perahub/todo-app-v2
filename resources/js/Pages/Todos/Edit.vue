<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Todo
            </h2>
        </template>
        <JetAuthenticationCard>
            <form class="mx-auto" @submit.prevent="update">
                <div>
                    <jet-label for="title" value="Title" />
                    <jet-input
                        id="title"
                        type="title"
                        class="shadow appearance-none border rounded py-2 px-3 text-grey-darker"
                        v-model="form.title"
                        autofocus
                        :error="form.errors.title"
                    />
                </div>
                <p class="text-red-800">{{ form.errors.title }}</p>
                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox
                            name="remember"
                            v-model:checked="form.is_finished"
                        />
                        <span class="ml-2 text-sm text-gray-600">{{
                            form.is_finished == 0 ? "incomplete" : "Completed"
                        }}</span>
                    </label>
                </div>
                <div>
                    <jet-button
                        class="ml-4 mt-4 float-right"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Update
                    </jet-button>
                </div>
            </form>
        </JetAuthenticationCard>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
import JetCheckbox from '@/Jetstream/Checkbox'
import JetLabel from '@/Jetstream/Label'
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import Swal from 'sweetalert2'
export default {
    components: {
        AppLayout,
        JetLabel,
        JetButton,
        JetInput,
        JetAuthenticationCard,
        JetCheckbox
    },
    props: {
        todo: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.todo.title,
                is_finished: this.todo.is_finished
            })
        }
    },
    methods: {
        update() {
            this.form.put(this.route('todos.update', this.todo.id), {
                onFinish: () => Swal.fire(
                    'Updated',
                    'Successfully Updated!',
                    'success'
                ),
            })
        },
    }
}
</script>

<style>
</style>