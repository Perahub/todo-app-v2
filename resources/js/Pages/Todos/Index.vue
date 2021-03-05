<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <welcome /> -->
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div
                                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                            >
                                <div
                                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                                >
                                    <inertia-link
                                        :href="route('todos.create')"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                                        >Create</inertia-link
                                    >
                                    <table
                                        class="min-w-full divide-y divide-gray-200"
                                    >
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                >
                                                    Title
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                >
                                                    Finished
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="relative px-6 py-3"
                                                >
                                                    <span class="sr-only"
                                                        >Edit</span
                                                    >
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200"
                                        >
                                            <tr
                                                v-for="todo in todos.data"
                                                :key="todo.id"
                                            >
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap"
                                                >
                                                    <div
                                                        class="flex items-center"
                                                    >
                                                        {{ todo.title }}
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap"
                                                >
                                                    <span
                                                        :class="
                                                            todo.is_finished ==
                                                            0
                                                                ? 'bg-red-100 text-red-800'
                                                                : 'bg-green-100 text-green-800'
                                                        "
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                                    >
                                                        {{
                                                            todo.is_finished ==
                                                            0
                                                                ? "incomplete"
                                                                : "Completed"
                                                        }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                                >
                                                    <inertia-link
                                                        :href="
                                                            route(
                                                                'todos.show',
                                                                todo.id
                                                            )
                                                        "
                                                        class="text-indigo-600 hover:text-indigo-900"
                                                        >View</inertia-link
                                                    >
                                                    |
                                                    <inertia-link
                                                        :href="
                                                            route(
                                                                'todos.edit',
                                                                todo.id
                                                            )
                                                        "
                                                        class="text-indigo-600 hover:text-indigo-900"
                                                        >Edit</inertia-link
                                                    >
                                                </td>
                                            </tr>
                                            <tr v-if="todos.data.length === 0">
                                                <td
                                                    class="border-t px-6 py-4"
                                                    colspan="4"
                                                >
                                                    No Todos found.
                                                </td>
                                            </tr>
                                            <!-- More items... -->
                                        </tbody>
                                    </table>
                                    <Pagination
                                        v-if="todos.data.length > 0"
                                        class="mt-6"
                                        :links="todos.links"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import Pagination from '../../Shared/Pagination'

export default {
    components: {
        AppLayout,
        Welcome,
        Pagination
    },
    props: {
        todos: Object,
    }
}
</script>
