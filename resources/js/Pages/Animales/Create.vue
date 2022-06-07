<template>

    <Head title="Añadir animal" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Añadir un animal
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <label for="raza">Nombre</label>
                                <input type="text" v-model="form.nombre" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                            </div>

                            <div>
                                <label for="historia">Historia</label>
                                <input type="textbox" v-model="form.historia" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                            </div>

                            <div>
                                <label for="superpoder">Superpoder</label>
                                <input type="textbox" v-model="form.superpoder" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                            </div>

                            <div>
                                <label for="fecha_entrada">Fecha de entrada al refugio</label>
                                <input type="date" v-model="form.fecha_entrada" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                            </div>

                            <div>
                                <label for="fecha_fallecimiento">Fecha de fallecimiento</label>
                                <input type="date" v-model="form.fecha_fallecimiento" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
                            </div>

                            <div class="mt-4">
                                <label for="equipo"> Equipo al que pertenece</label>
                                <select for="equipo" id="equipo" v-model="form.equipos_id" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " required>
                                    <option v-for="equipo in equipos" :key="equipo.id" v-bind:value="equipo.id">
                                        {{ equipo.raza }}
                                    </option>
                                    <br />
                                </select>
                            </div>
                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button class="
                                        px-6
                                        py-2
                                        text-white
                                        bg-gray-900
                                        rounded
                                    ">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLabel from "@/Components/Label";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup() {
        const form = useForm({
            nombre: '', 
            historia: '', 
            superpoder: '', 
            fecha_entrada: '', 
            fecha_fallecimiento: '', 
            equipos_id: '', 
        });

        return { form };
    },
    props: {
        equipos: Array,
    },
    methods: {
        submit() {
            this.form.post(route("animales.store"));
        },
    },
};
</script>