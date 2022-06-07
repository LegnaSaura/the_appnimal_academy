<template>
<Head title="Apadrinamiento" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Apadrinamiento
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
                                " :href="route('apadrinamientos.create')">
                        Añadir un apadrinamiento
                        </Link>
                    </div>
                    <table>
                        <thead class="font-bold bg-gray-300 border-b-2">
                            <td class="px-4 py-2">Equipo</td>
                            <td class="px-4 py-2">Animal</td>
                            <td class="px-4 py-2">Tipo</td>
                            <td class="px-4 py-2">Fecha de inicio</td>
                            <td class="px-4 py-2">Fecha de fin</td>
                            <td class="px-4 py-2">Cantidad donada</td>
                            <td class="px-4 py-2">Pago confirmado</td>
                            <td class="px-4 py-2">Acciones</td>
                        </thead>
                        <tbody>
                            <tr v-for="apadrinamiento in apadrinamientos.data" :key="apadrinamiento.id">
                                
                                <td class="px-4 py-2">{{ equipos[ animales[apadrinamiento.animales_id - 1].equipos_id - 1 ].raza }} </td>
                                <td class="px-4 py-2">{{ animales[apadrinamiento.animales_id - 1].nombre}}</td>
                                <td class="px-4 py-2">{{ apadrinamiento.tipo }}</td>
                                <td class="px-4 py-2">{{apadrinamiento.fecha_inicio }}</td>
                                <td class="px-4 py-2">{{apadrinamiento.fecha_fin }}</td>
                                <td class="px-4 py-2">{{apadrinamiento.cantidad }}</td>
                                <td class="px-4 py-2">{{apadrinamiento.confirmacion_pago }}</td>
                                <td class="px-4 py-2 font-extrabold">
                                    <Link class="text-green-700" :href="route('apadrinamientos.edit', apadrinamiento.id)">
                                    Editar 
                                    </Link>
                                    <Link @click="destroy(apadrinamiento.id)" class="text-red-700">Borrar</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :links="apadrinamientos.links" />
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
        apadrinamientos: Object,
        usuarios: Array,
        equipos: Array, 
        animales: Array, 
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("apadrinamientos.destroy", id));
        },
    },
};
</script>