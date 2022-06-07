<template>

    <Head title="Usuarios" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-12xl sm:px-6 lg:px-10">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-8 bg-white border-b border-gray-200">
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-1 py-2">Email</td>
                                <td class="px-1 py-2">DNI</td>
                                <td class="px-3 py-2">Nombre completo</td>
                                <td class="px-1 py-2">Fecha de nacimiento</td>
                                <td class="px-1 py-2">Dirección completa</td>
                                <td class="px-1 py-2">Teléfono</td>
                                <td class="px-1 py-2">Consentimiento de imágenes</td>
                                <td class="px-1 py-2">Consentimiento de comunicaciones</td>
                                <td class="px-1 py-2">Rol</td>
                                <td class="px-1 py-2">Acciones</td>
                            </thead>
                            <tbody>
                                <tr v-for="usuario in usuarios.data" :key="usuario.id">
                                    <td class="px-1 py-2">{{ usuario.email }}</td>
                                    <td class="px-1 py-2">{{ usuario.DNI }}</td>
                                    <td class="px-3 py-2">
                                        {{ usuario.nombre }} {{ usuario.primer_apellido }} {{ usuario.segundo_apellido }}
                                    </td>
                                    <td class="px-1 py-2">
                                        {{ usuario.fecha_nacimiento }}
                                    </td>
                                    <td class="px-1 py-2">
                                        {{ usuario.domicilio }}, {{ usuario.poblacion }}, {{ usuario.codigo_postal }},
                                        {{ usuario.pais_residencia }}
                                    </td>
                                    <td class="px-1 py-2">
                                        {{ usuario.telefono }}
                                    </td>
                                    <td class="px-1 py-2">
                                        {{ usuario.consentimiento_imagenes }}
                                    </td>
                                    <td class="px-1 py-2">
                                        {{ usuario.consentimiento_comunicaciones }}
                                    </td>
                                    <td class="px-1 py-2">
                                        {{ usuario.rol }}
                                    </td>
                                    <td class=" font-extrabold">
                                        <Link class="text-green-700" :href="route('usuarios.edit', usuario.id)">
                                        Editar
                                        </Link>
                                        <Link @click="destroy(usuario.id)" class="text-red-700">Borrar</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :links="usuarios.links" />
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
        usuarios: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("usuarios.destroy", id));
        },
    },
};
</script>