
<template>

    <Head title="Equipos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Equipos
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link class="
                                    px-6
                                    py-2
                                    mb-2
                                    text-green-100
                                    bg-green-500
                                    rounded
                                " :href="route('equipos.create')">
                            Añadir un equipo
                            </Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Raza</td>
                                <td class="px-4 py-2">Acciones</td>
                            </thead>
                            <tbody>
                                <tr v-for="equipo in equipos.data" :key="equipo.id">
                                    <td class="px-4 py-2">{{ equipo.id }}</td>
                                    <td class="px-4 py-2">{{ equipo.raza }}</td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link class="text-green-700" :href="route('equipos.edit', equipo.id)">
                                        Editar
                                        </Link>
                                        <Link @click="destroy(equipo.id)" class="text-red-700">Borrar</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :links="equipos.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
    },
    props: {
        equipos: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("equipos.destroy", id));
        },
    },
};
</script>