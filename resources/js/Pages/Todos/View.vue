<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Todo
            </h2>
        </template>
        <JetAuthenticationCard>
            <form class="mx-auto" @submit.prevent="update">
                <div>
                    Title:
                    <jet-label for="title" :value="form.title" />
                </div>
                <div class="block mt-4">
                    <label class="flex items-center">
                        <jet-checkbox
                            disabled
                            name="remember"
                            v-model:checked="form.is_finished"
                        />
                        <span class="ml-2 text-sm text-gray-600">{{
                            form.is_finished == 0 ? "incomplete" : "Completed"
                        }}</span>
                    </label>
                </div>
                <button
                    v-if="!todo.deleted_at"
                    class="text-red-600 bg-dark mt-4"
                    tabindex="-1"
                    type="button"
                    @click="destroy"
                >
                    Delete Contact
                </button>
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
            this.form.put(this.route('todos.update', this.todo.id))
        },
        destroy() {

            Swal.fire({
                title: 'Do you want to delete this todo?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: `Confirm`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    this.$inertia.delete(this.route('todos.destroy', this.todo.id), {
                        onFinish: () => Swal.fire(
                            'Deleted',
                            'Successfully Deleted!',
                            'success'
                        ),
                    })
                }
            })
        },
    }
}
</script>

<style>
</style>