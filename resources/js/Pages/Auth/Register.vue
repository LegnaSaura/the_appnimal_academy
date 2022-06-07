<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    email: '',
    password: '',
    password_confirmation: '',
    DNI: '',
    nombre: '',
    primer_apellido: '',
    segundo_apellido: '',
    fecha_nacimiento: '',
    pais_residencia: '',
    domicilio: '',
    codigo_postal: '',
    poblacion: '',
    telefono: '',
    consentimiento_imagenes: '',
    consentimiento_comunicaciones: '',
    refugios_id: '1',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>

    <Head title="Registro" />

    <BreezeValidationErrors class="mb-4" />

    <!-- Nuevo formulario de registro.-->

    <div class="bg-gray-100">
        <div class="container mx-auto">
            <!-- Primera fila, solo contiene el logo y el texto de agradecimiento. -->
            <div role="article" class="bg-gray-100 py-12 md:px-8">
                <div class="px-4 xl:px-0 py-10">
                    <div class="flex flex-col lg:flex-row flex-wrap">
                        <div class="lg:w-2/5 flex mt-10 ml-2 lg:ml-0 lg:mt-0 ">
                            <div>
                                <h1
                                    class="text-3xl ml-2 lg:ml-0 lg:text-4xl font-bold text-gray-900 tracking-normal lg:w-11/12">
                                    Logo</h1>
                            </div>
                        </div>
                        <div class="mt-4 lg:mt-0 lg:w-3/5 lg:justify-end">
                            <div>
                                <h1
                                    class="text-3xl ml-2 lg:ml-0 lg:text-4xl font-bold text-gray-900 tracking-normal lg:w-11/12">
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
                                            <BreezeLabel for="email" value="Correo electrónico" />
                                            <BreezeInput id="email" v-model="form.email" type="email"
                                                class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="password" value="Contraseña" />
                                            <BreezeInput id="password" v-model="form.password" type="password"
                                                class="mt-1 block w-full" required autocomplete="new-password" />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="password_confirmation" value="Confirmar contraseña" />
                                            <BreezeInput id="password_confirmation" v-model="form.password_confirmation"
                                                type="password" class="mt-1 block w-full" required
                                                autocomplete="new-password" />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="telefono" value="Teléfono" />
                                            <BreezeInput id="telefono" v-model="form.telefono" type="text"
                                                class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="pais_residencia" value="País de residencia" />
                                            <BreezeInput id="pais_residencia" v-model="form.pais_residencia" type="text"
                                                class="mt-1 block w-full" required />
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
                                            <BreezeLabel for="nombre" value="Nombre" />
                                            <BreezeInput id="nombre" v-model="form.nombre" type="text"
                                                class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="primer_apellido" value="Primer apellido" />
                                            <BreezeInput id="primer_apellido" v-model="form.primer_apellido" type="text"
                                                class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="segundo_apellido" value="Segundo apellido" />
                                            <BreezeInput id="segundo_apellido" v-model="form.segundo_apellido"
                                                type="text" class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="fecha_nacimiento" value="Fecha de nacimiento" />
                                            <BreezeInput id="fecha_nacimiento" v-model="form.fecha_nacimiento"
                                                type="date" class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="codigo_postal" value="Código postal" />
                                            <BreezeInput id="codigo_postal" v-model="form.codigo_postal" type="text"
                                                class="mt-1 block w-full" required />
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
                                            <BreezeLabel for="DNI" value="Documento de identidad" />
                                            <BreezeInput id="DNI" v-model="form.DNI" type="text"
                                                class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="poblacion" value="Población" />
                                            <BreezeInput id="poblacion" v-model="form.poblacion" type="text"
                                                class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="domicilio" value="Domicilio" />
                                            <BreezeInput id="domicilio" v-model="form.domicilio" type="text"
                                                class="mt-1 block w-full" required />
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="consentimiento_comunicaciones"
                                                value="Marque esta casilla si acepta el envío de comunicaciones por parte de The Animal Academy:" />
                                            <BreezeInput type="checkbox" class="form-check-input"
                                                id="consentimiento_comunicaciones" v-model="form.consentimiento_comunicaciones"
                                                value="Sí" />
                                            <label for="check-1" class="form-check-label">Sí</label>
                                            <br>
                                            <BreezeInput type="checkbox" class="form-check-input"
                                                id="consentimiento_comunicaciones" v-model="form.consentimiento_comunicaciones"
                                                value="No" />
                                            <label for="check-1" class="form-check-label">No</label>
                                        </div>

                                        <div class="mt-4">
                                            <BreezeLabel for="consentimiento_imagenes"
                                                value="Marque esta casilla si acepta el uso de las imágenes que le tomemos durante su visita al refugio en nuestras redes sociales:" />
                                            <BreezeInput type="checkbox" class="form-check-input"
                                                id="consentimiento_imagenes" v-model="form.consentimiento_imagenes"
                                                value="Sí" />
                                            <label for="check-1" class="form-check-label">Sí</label>
                                            <br>
                                            <BreezeInput type="checkbox" class="form-check-input"
                                                id="consentimiento_imagenes" v-model="form.consentimiento_imagenes"
                                                value="No" />
                                            <label for="check-1" class="form-check-label">No</label>
                                        </div>

                                        <div class="mt-4 ">
                                            <Link :href="route('login')"
                                                class="underline text-sm text-gray-600 hover:text-gray-900">
                                            Ya tengo una cuenta, deseo conectarme
                                            </Link>

                                            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                                :disabled="form.processing">
                                                Registrarse
                                            </BreezeButton>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</template>
