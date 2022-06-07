<template>
<Head title="Añadir donativo" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Registrar tu donativo
        </h2>
    </template>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form @submit.prevent="submit">
                        <div>
                            <label for="fecha">Fecha en la que realizaste el donativo</label>
                            <input type="date" v-model="form.fecha" class="
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

                        <div class="mt-4">
                            <label for="importe"> Importe de tu donativo </label>
                            <input type="number" v-model="form.importe" class="
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
                            <label for="tipo"> Indícanos que medio se ha usado </label>
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
                                <option value="Transferencia bancaria"> Transferencia bancaria </option>
                                <option value="Bizum"> Bizum </option>
                                <option value="Tarjeta"> Tarjeta </option>
                                <option value="Teaming"> Teaming </option>
                                <option value="Facebook"> Facebook </option>
                                <option value="Instagram"> Instagram </option>
                                <option value="Paypal"> Paypal </option>
                                <br />
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="usuario_instagram"> Indícanos tu usuario de Instagram: </label>
                            <input type="text" v-model="form.usuario_instagram" class="
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
                            <label for="usuario_facebook"> Indícanos tu usuario de Facebook:</label>
                            <input type="text" v-model="form.usuario_facebook" class="
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
import {
    computed
} from 'vue';
import {
    usePage
} from '@inertiajs/inertia-vue3'
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup() {
        const form = useForm({
            fecha: null,
            importe: null,
            tipo: null,
            usuario_instagram: null,
            usuario_facebook: null,
            DNI: null,
            pago_confirmado: 'No',
            users_id: null,
        });

        return {
            form,
        };
    },
    methods: {
        submit() {
            this.form.post(route("donativos.store"));
        },
    },
};
</script>
