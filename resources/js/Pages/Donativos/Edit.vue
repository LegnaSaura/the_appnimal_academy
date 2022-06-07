<template>
<Head title="Editar donativo" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editar donativo
        </h2>
    </template>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form @submit.prevent="submit">

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

                        <div>
                            <label for="usuario_instagram">Usuario de instagram</label>
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

                        <div>
                            <label for="usuario_facebook">Usuario de Facebook</label>
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

                        <div class="mt-4">
                            <label for="pago_confirmado">Pago confirmado</label>
                            <select for="pago_confirmado" id="pago_confirmado" v-model="form.pago_confirmado" class="
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
                                <option value="Sí">
                                    Sí
                                </option>
                                <option value="No">
                                    No
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
                                Guardar cambios
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
    setup(props) {
        const form = useForm({
            id: props.donativo.id,
            fecha: props.donativo.fecha,
            importe: props.donativo.importe,
            tipo: props.donativo.tipo,
            usuario_instagram: props.donativo.usuario_instagram,
            usuario_facebook: props.donativo.usuario_facebook,
            DNI: props.donativo.DNI,
            pago_confirmado: props.donativo.pago_confirmado,
        });

        return {
            form
        };
    },
    props: {
        donativo: Object,
    },
    methods: {
        submit() {
            this.form.put(route("donativos.update", this.donativo.id));
        },
    },
};
</script>
