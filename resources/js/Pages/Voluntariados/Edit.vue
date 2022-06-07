<template>
<Head title="Añadir voluntariado" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Añadir un voluntariado
        </h2>
    </template>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form @submit.prevent="submit">
                        <div>
                            <label for="tipo"> Tipo </label>
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
                                <option value="Diario">
                                    Diario
                                </option>
                                <option value="Digital">
                                    Digital
                                </option>
                                <option value="Puntual">
                                    Puntual
                                </option>
                                <br />
                            </select>
                            <br />
                        </div>

                        <div>
                            <template v-if="form.tipo === 'Digital' ">
                                <label for="tareas"> Selecciona al menos una tarea</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas1" v-model="checkedTareas" value="Pensa y comunicación" />
                                <label for="check-1" class="form-check-label"> Pensa y comunicación</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas2" v-model="checkedTareas" value="Organización de eventos solidarios " />
                                <label for="check-1" class="form-check-label"> Organización de eventos solidarios </label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas3" v-model="checkedTareas" value="Redes sociales" />
                                <label for="check-1" class="form-check-label"> Redes sociales</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas4" v-model="checkedTareas" value="Traducción " />
                                <label for="check-1" class="form-check-label"> Traducción </label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas5" v-model="checkedTareas" value="Diseño gráfico" />
                                <label for="check-1" class="form-check-label"> Diseño gráfico</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas6" v-model="checkedTareas" value="Fotografía profesional" />
                                <label for="check-1" class="form-check-label"> Fotografía profesional</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas7" v-model="checkedTareas" value="Recaudación de fondos" />
                                <label for="check-1" class="form-check-label"> Recaudación de fondos</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas8" v-model="checkedTareas" value="Punto solidario en tiendas o mercadillos" />
                                <label for="check-1" class="form-check-label"> Punto solidario en tiendas o mercadillos</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas9" v-model="checkedTareas" value="Huchas solidarias" />
                                <label for="check-1" class="form-check-label"> Huchas solidarias</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas0" v-model="checkedTareas" value="Donación de arte" />
                                <label for="check-1" class="form-check-label"> Donación de arte</label>
                                <br />
                            </template>
                            <template v-else-if="form.tipo === 'Puntual' ">
                                <label for="tareas"> Selecciona al menos una tarea</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas10" v-model="checkedTareas" value="Organizar y participar en eventos" />
                                <label for="check-1" class="form-check-label"> Organizar y participar en eventos</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas11" v-model="checkedTareas" value="Hacer una jornada en nuestro Punto Solidario" />
                                <label for="check-1" class="form-check-label"> Hacer una jornada en nuestro Punto Solidario</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas12" v-model="checkedTareas" value="Incorporación en jornadas" />
                                <label for="check-1" class="form-check-label"> Incorporación en jornadas de voluntarios diarios y así dividir las tareas dificultosas entre un mayor equipo de personas</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas13" v-model="checkedTareas" value="Atender a los grupos de visitas" />
                                <label for="check-1" class="form-check-label"> Atender a los grupos de visitas</label>
                                <br />
                                <input type="checkbox" class="form-check-input" id="tareas14" v-model="checkedTareas" value="Realizar una obra de arte" />
                                <label for="check-1" class="form-check-label"> Realizar una obra de arte en coordinación con nuestro equipo para donar en las rifas solidarias</label>
                                <br />
                            </template>
                            <template v-else-if="form.tipo === 'Diario' ">
                                <label for="tareas"> Selecciona al menos una tarea</label>
                                <br />
                                <input type="checkbox" id="tareas15" value="Limpieza, manejo cuidado y alimentación" v-model="checkedTareas">
                                <label for="check-1" class="form-check-label"> Limpieza, manejo cuidado y alimentación</label>
                                <br />
                            </template>
                            <template v-else>
                                <label for="tareas"> Seleccione tipo de voluntariado para ver las tareas asociadas</label>
                            </template>
                            <br>
                        </div>

                        <div>
                            <label for="disponibilidad">Disponibilidad</label>
                            <input type="textbox" v-model="form.disponibilidad" class="
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
                            <label for="coche_propio"> Dispone de coche propio </label>
                            <select for="coche_propio" id="coche_propio" v-model="form.coche_propio" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    ">
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
    data() {
        return {
            checkedTareas: [],
        }
    },
    setup(props) {
        const form = useForm({
            id: props.voluntariado.id,
            tipo: props.voluntariado.tipo,
            tareas: props.voluntariado.tareas,
            disponibilidad: props.voluntariado.disponibilidad,
            coche_propio: props.voluntariado.coche_propio,
            users_id: props.voluntariado.users_id,
        });

        return {
            form
        };
    },
    props: {
        voluntariado: Object,
    },
    methods: {
        submit() {
            this.form.tareas = this.checkedTareas.join(',');
            this.form.put(route("voluntariados.update", this.voluntariado.id));
        },
    },
};
</script>
