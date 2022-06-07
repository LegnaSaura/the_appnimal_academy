<template>
<Head title="Apadrinar" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Apadrinar un animal
        </h2>
    </template>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <label for="raza"> Elige a que equipo quieres apoyar </label>
                        <select for="raza" id="raza" v-model="apoyar" class="
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
                        <br />
                    </div>
                    <form @submit.prevent="submit">
                        <div class="mt-4">
                            <label for="animales_id"> Elige el superhéroe al que apoyar </label>
                            <select for="animales_id" id="animales_id" v-model="form.animales_id" class="
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
                                <option v-for="animal in animales" :key="animal.id" v-bind:value="animal.id">
                                    {{ animal.nombre }}
                                </option>
                                <br />
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="tipo"> Elige el tipo de apadrinamiento </label>
                            <select for="tipo" id="tipo" v-model="form.tipo" class="
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
                                <option value="Mensual"> Mensual </option>
                                <option value="Trimestral"> Trimestral </option>
                                <option value="Anual"> Anual </option>
                                <br />
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="cantidad"> Importe con el que contribuiste </label>
                            <p v-if="form.tipo == 'Mensual'"> Recuerda que el donativo mínimo es de 10€ mensuales.
                                Nuestros animales agradecen tu ayuda.</p>
                            <p v-else-if="form.tipo == 'Trimestral'"> Para este tipo de apadrinamiento sería necesario un donativo de 30€. Nuestros animales agradecen tu ayuda.</p>
                            <p v-else-if="form.tipo == 'Anual'"> Para este tipo de apadrinamiento sería necesario un donativo de 120€. Nuestros animales agradecen tu ayuda.</p>
                            <p v-else="form.tipo == ''"> Este importe nos ayuda a dar a nuestros animales los cuidados, medicamentos, alimentos e instalaciones que merecen</p>
                            <input type="number" v-model="form.cantidad" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " requiered />
                        </div>

                        <div>
                            <label for="fecha">Fecha en la que realizaste el ingreso</label>
                            <input type="date" v-model="form.fecha_inicio" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " requiered />
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
import {
    Head
} from "@inertiajs/inertia-vue3";
import {
    useForm
} from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup() {
        const form = useForm({
            tipo: null,
            fecha_inicio: null,
            fecha_fin: null,
            cantidad: null,
            users_id: null,
            animales_id: null,
            confirmacion_pago: 'No',
        });

        const apoyar = '';

        return {
            form,
            apoyar,
        };
    },
    props: {
        equipos: Array,
        animales: Array,
    },
    methods: {
        submit() {
            this.form.post(route("apadrinamientos.store"));
        },
    },
    computed: {
        animalesFiltrados() {
            let tempAnimales = this.animales

            tempAnimales = tempAnimales.filter((item) => {
                return (item.equipos_id == apoyar)
            })

            return tempAnimales;
        }
    },
};
</script>
