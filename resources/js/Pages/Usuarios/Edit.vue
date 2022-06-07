<template>
<Head title="Editar usuario" />

<BreezeAuthenticatedLayout>
    <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Editar usuario
        </h2>
    </template>

    <!-- Nuevo formulario de registro.-->

    <div class="bg-gray-100">
        <div class="container mx-auto">
            <!-- Primera fila, solo contiene el logo y el texto de agradecimiento. -->
            <div role="article" class="bg-gray-100 py-12 md:px-8">
                <div class="px-4 xl:px-0 py-10">
                    <div class="flex flex-col lg:flex-row flex-wrap">
                        <div class="lg:w-2/5 flex mt-10 ml-2 lg:ml-0 lg:mt-0 ">
                            <div>
                                <h1 class="text-3xl ml-2 lg:ml-0 lg:text-4xl font-bold text-gray-900 tracking-normal lg:w-11/12">
                                    Logo</h1>
                            </div>
                        </div>
                        <div class="mt-4 lg:mt-0 lg:w-3/5 lg:justify-end">
                            <div>
                                <h1 class="text-3xl ml-2 lg:ml-0 lg:text-4xl font-bold text-gray-900 tracking-normal lg:w-11/12">
                                    Texto de agradecimiento</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <form @submit.prevent="submit">
                    <div class="px-6 xl:px-0">
                        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 pb-6 gap-8">
                            <!-- Primera card, datos de conexión y contacto  -->
                            <div role="cell" class="bg-gray-100">
                                <div class="bg-white p-5 rounded-md relative h-full w-full">
                                    <!-- class="absolute inset-0 object-center object-cover h-full w-full"  -->
                                    <h1 class="pb-4 text-2xl font-semibold"> Datos de conexión y contacto: </h1>
                                    <div class="my-5">
                                        <!-- Datos a ser introducidos.   -->

                                        <div class="mt-4">
                                            <label for="email">Correo electrónico</label>
                                            <input type="text" v-model="form.email" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="rol"> Rol</label>
                                            <input type="text" v-model="form.rol" class="
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
                                            <label for="rol"> Rol </label>
                                            <select for="rol" id="rol" v-model="form.rol" class="
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
                                                <option value="Usuario"> Usuario </option>
                                                <option value="Administrador"> Administrador </option>
                                                <option value="Contable"> Contable </option>
                                                <option value="Veterinario"> Veterinario </option>
                                                <option value="Recursos humanos"> Recursos humanos </option>
                                                <br />
                                            </select>
                                        </div>

                                        <div class="mt-4">
                                            <label for="telefono"> Teléfono</label>
                                            <input type="text" v-model="form.telefono" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="pais_residencia"> País de residencia</label>
                                            <input type="text" v-model="form.pais_residencia" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- Segunda card, datos personales   -->
                            <div role="cell" class="bg-gray-100">
                                <div class="bg-azul_corp p-5 rounded-md relative h-full w-full">
                                    <!-- class="absolute inset-0 object-center object-cover h-full w-full"  -->
                                    <h1 class="pb-4 text-2xl font-semibold"> Datos personales: </h1>
                                    <div class="my-5">
                                        <!-- Datos a ser introducidos.   -->

                                        <div class="mt-4">
                                            <label for="nombre"> Nombre</label>
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
                                                " required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="primer_apellido">Primer apellido</label>
                                            <input type="text" v-model="form.primer_apellido" class="
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
                                            <label for="segundo_apellido"> Segundo apellido</label>
                                            <input type="text" v-model="form.segundo_apellido" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- Tercera card, datos personales parte 2 y consentimientos   -->
                            <div role="cell" class="bg-gray-100">
                                <div class="bg-amarillo_corp p-5 rounded-md relative h-full w-full">
                                    <!-- class="absolute inset-0 object-center object-cover h-full w-full"  -->
                                    <div class="my-5">
                                        <!-- Datos a ser introducidos.   -->

                                        <div class="mt-4">
                                            <label for="codigo_postal"> Código postal</label>
                                            <input type="text" v-model="form.codigo_postal" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="DNI"> DNI</label>
                                            <input type="text" v-model="form.DNI" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="poblacion">Población</label>
                                            <input type="text" v-model="form.poblacion" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>

                                        <div class="mt-4">
                                            <label for="domicilio"> Domicilio </label>
                                            <input type="text" v-model="form.domicilio" class="
                                                    w-full
                                                    px-4
                                                    py-2
                                                    mt-2
                                                    border
                                                    rounded-md
                                                    focus:outline-none
                                                    focus:ring-1
                                                    focus:ring-blue-600
                                                " required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

</BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import {
    Head,
    useForm
} from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup(props) {
        const form = useForm({
            email: props.usuario.email,
            password: props.usuario.password,
            DNI: props.usuario.DNI,
            nombre: props.usuario.nombre,
            primer_apellido: props.usuario.primer_apellido,
            segundo_apellido: props.usuario.segundo_apellido,
            fecha_nacimiento: props.usuario.fecha_nacimiento,
            pais_residencia: props.usuario.pais_residencia,
            domicilio: props.usuario.domicilio,
            codigo_postal: props.usuario.codigo_postal,
            poblacion: props.usuario.poblacion,
            telefono: props.usuario.telefono,
            consentimiento_imagenes: props.usuario.consentimiento_imagenes,
            consentimiento_comunicaciones: props.usuario.consentimiento_comunicaciones,
            rol: props.usuario.rol,
        });

        return {
            form
        };
    },
    props: {
        usuario: Object,
    },
    methods: {
        submit() {
            this.form.put(route("usuarios.update", this.usuario.id));
        },
    },
};
</script>
