<template>
<Head title="Donativos" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Donativos
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
                                " :href="route('donativos.create')">
                        Añadir un donativo
                        </Link>
                    </div>
                    <table>
                        <thead class="font-bold bg-gray-300 border-b-2">
                            <td class="px-4 py-2">ID</td>
                            <td class="px-4 py-2">Fecha</td>
                            <td class="px-4 py-2">Tipo</td>
                            <td class="px-4 py-2">Usuario de Instagram</td>
                            <td class="px-4 py-2">Usuario de Facebook</td>
                            <td class="px-4 py-2">DNI contribuidor</td>
                            <td class="px-4 py-2">Pago confirmado</td>
                            <td class="px-4 py-2">Acciones</td>
                        </thead>
                        <tbody>
                            <tr v-for="donativo in donativos.data" :key="donativo.id">
                                <td class="px-4 py-2">{{ donativo.id }}</td>
                                <td class="px-4 py-2">{{ donativo.fecha }}</td>
                                <td class="px-4 py-2">{{ donativo.tipo }}</td>
                                <td class="px-4 py-2">{{ donativo.usuario_instagram }}</td>
                                <td class="px-4 py-2">{{ donativo.usuario_facebook }}</td>
                                <td class="px-4 py-2">{{ donativo.DNI }}</td>
                                <td class="px-4 py-2">{{ donativo.pago_confirmado }}</td>
                                <td class="px-4 py-2 font-extrabold">
                                    <Link class="text-green-700" :href="route('donativos.edit', donativo.id)">
                                    Editar
                                    </Link>
                                    <Link @click="destroy(donativo.id)" class="text-red-700">Borrar</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :links="donativos.links" />
                </div>
            </div>
        </div>
    </div>
</BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import {
    Head
} from "@inertiajs/inertia-vue3";
import {
    Link
} from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
    },
    props: {
        donativos: Object,
        usuarios: Array,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("donativos.destroy", id));
        },
    },
};
</script>
