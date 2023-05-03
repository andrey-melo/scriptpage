<template>
    <head> </head>
    <crud
        contentHeader="Clientes"
        createTitle="Cadastrar novo Cliente"
        updateTitle="Atualizar cadastro de Cliente"
        :urlUpdate="route('clients.update', form.id ? form.id : 0)"
        :urlStore="route('clients.store', form.id ? form.id : 0)"
        :urlDestroy="route('clients.destroy', form.id ? form.id : 0)"
        :form="form">
        <!-- Name -->
        <div class="d-flex flex-wrap justify-content-between">
            <div class="form-group">
                <label class="form-label" for="client-name">Name</label>
                <input
                    id="client-name"
                    type="text"
                    placeholder="Nome completo"
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.name }"
                    v-model="form.name" />
                <span class="invalid-feedback">{{ errors.name }}</span>
            </div>
            <!-- CPF -->
            <div class="form-group">
                <label for="client-cpf">CPF</label>
                <input
                    id="client-cpf"
                    type="text"
                    placeholder="000.000.000-00"
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.cpf }"
                    v-model="form.cpf" />
                <span class="invalid-feedback">{{ errors.cpf }}</span>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="client-email">Email</label>
                <input
                    id="client-email"
                    type="text"
                    placeholder="example@email.com"
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.email }"
                    v-model="form.email" />
                <div class="invalid-feedback">{{ errors.email }}</div>
            </div>
            <!-- Data de Nascimento -->
            <div class="form-group">
                <label for="client-birth">Data de Nascimento</label>
                <input
                    id="client-birth"
                    type="text"
                    data-inputmask-alias="datetime" 
                    data-inputmask-inputformat="yyyy/mm/dd"
                    data-mask
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.birth }"
                    v-model="form.birth" />
                <div class="invalid-feedback">{{ errors.birth }}</div>
            </div>
            <!-- Numero de Telefone -->
            <div class="form-group">
                <label for="client-tel_num">Telefone</label>
                <input
                    id="client-tel_num"
                    type="text"
                    class="form-control data-mask"
                    v-model="form.tel_num"
                    :class="{ 'is-invalid': errors.tel_num }" />
                <div class="invalid-feedback">{{ errors.tel_num }}</div>
            </div>
            <!-- CEP -->
            <div class="form-group">
                <label for="client-cep">CEP</label>
                <input
                    id="client-cep"
                    type="text"
                    placeholder="00000-000"
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.cep }"
                    v-model="form.cep" />
                <div class="invalid-feedback">{{ errors.cep }}</div>
            </div>
            <!-- Estado -->
            <div class="form-group">
                <label for="client-state">Estado</label>
                <input
                    id="client-state"
                    type="text"
                    placeholder="Estado"
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.state }"
                    v-model="form.state" />
                <div class="invalid-feedback">{{ errors.state }}</div>
            </div>
            <!-- Cidade -->
            <div class="form-group">
                <label for="client-city">Cidade</label>
                <input
                    id="client-city"
                    type="text"
                    placeholder="Cidade"
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.city }"
                    v-model="form.city" />
                <div class="invalid-feedback">{{ errors.city }}</div>
            </div>
            <!-- Endereço -->
            <div class="form-group">
                <label for="client-address">Endereço</label>
                <input
                    id="client-address"
                    type="text"
                    placeholder="Rua example, 123"
                    class="form-control data-mask"
                    :class="{ 'is-invalid': errors.address }"
                    v-model="form.address" />
                <div class="invalid-feedback">{{ errors.address }}</div>
            </div>
        </div>
    </crud>
</template>

<script>

import { useForm } from "@inertiajs/inertia-vue3";
import Crud from "@/Scriptpage/Content/Crud.vue";





export default {

   
    components: {
        Crud,

    },

    props: {
        errors: Object,
        data: Object,
    },

    data() {

        var data = this.data;
        return {
            form: useForm({
                id: data.id,
                name: data.name,
                cpf: data.cpf,
                email: data.email,
                birth: data.birth,
                tel_num: data.tel_num,
                cep: data.cep,
                state: data.state,
                city: data.city,
                address: data.address,

            }),
        };
    },
    mounted() {
        var form = this.form;

        $('#client-tel_num').inputmask('(99) 9 9999-9999');
        $('#client-birth').inputmask('yyyy/mm/dd');


        $('.data-mask').on("input", function (e) {
            form.tel_num = $('#client-tel_num').inputmask("unmaskedvalue");
            form.birth = $('#client-birth').inputmask("unmaskedvalue");
        });

    },
    

};
</script>

