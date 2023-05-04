<template>
  <head> </head>
  <crud
    contentHeader="Clientes"
    createTitle="Cadastrar novo Cliente"
    updateTitle="Atualizar cadastro de Cliente"
    :urlUpdate="route('clients.update', form.id ? form.id : 0)"
    :urlStore="route('clients.store', form.id ? form.id : 0)"
    :urlDestroy="route('clients.destroy', form.id ? form.id : 0)"
    :form="form"
  >
    <div class="d-flex flex-wrap justify-content-between">
      <!-- Name -->

      <div class="form-group">
        <label for="client-name">Name</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
          <input
            id="client-name"
            type="text"
            placeholder="Nome completo"
            class="form-control"
            :class="{ 'is-invalid': errors.name }"
            v-model="form.name"
          />
        </div>
        <span class="invalid-feedback">{{ errors.name }}</span>
      </div>

      <!-- CPF -->

      <div class="form-group">
        <label for="client-cpf">CPF</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-id-card"></i></span>
          </div>
          <input
            id="client-cpf"
            type="text"
            placeholder="000.000.000-00"
            class="form-control"
            :class="{ 'is-invalid': errors.cpf }"
            v-model="form.cpf"
          />
        </div>
        <span class="invalid-feedback">{{ errors.cpf }}</span>
      </div>

      <!-- Email -->

      <div class="form-group">
        <label for="client-email">Email</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"
              ><i class="far fa-envelope"></i
            ></span>
          </div>
          <input
            id="client-email"
            type="text"
            placeholder="example@email.com"
            class="form-control"
            :class="{ 'is-invalid': errors.email }"
            v-model="form.email"
          />
        </div>
        <div class="invalid-feedback">{{ errors.email }}</div>
      </div>

      <!--Data de Nascimento-->

      <div class="form-group">
        <label for="client-birth"
          ><i class="far fa-calendar-alt fa-fw"></i> Data de Nascimento</label
        >
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"
              ><i class="far fa-calendar-alt"></i
            ></span>
          </div>
          <input
            id="client-birth"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': errors.birth }"
            v-model="form.birth"
            placeholder="DD/MM/AAAA"
          />
        </div>
      </div>

      <!-- Numero de Telefone -->

      <div class="form-group">
        <label for="client-tel_num">Telefone</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
          </div>
          <input
            id="client-tel_num"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': errors.tel_num }"
            v-model="form.tel_num"
            placeholder="(DDD)99999-9999"
          />
        </div>
        <div class="invalid-feedback">{{ errors.tel_num }}</div>
      </div> 

      <!-- CEP -->

      <div class="form-group">
        <label for="client-cpf">CEP</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
          </div>
          <input
            id="client-cpf"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': errors.cpf }"
            v-model="form.cpf"
            placeholder="000.000.000-00"
          />
        </div>
        <span class="invalid-feedback">{{ errors.cpf }}</span>
      </div>


      <!-- Estado -->

      <div class="form-group">
        <label for="client-state">Estado</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"
              ><i class="fas fa-map-marker-alt"></i
            ></span>
          </div>
          <input
            id="client-state"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': errors.state }"
            v-model="form.state"
            placeholder="Estado"
          />
        </div>
        <span class="invalid-feedback">{{ errors.state }}</span>
      </div>

      <!-- Cidade -->


      <div class="form-group">
        <label for="client-city">Cidade</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"
              ><i class="fas fa-map-marker-alt"></i
            ></span>
          </div>
          <input
            id="client-city"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': errors.city }"
            v-model="form.city"
            placeholder="Cidade"
          />
        </div> 
        <span class="invalid-feedback">{{ errors.city }}</span>
      </div>



      <!-- Endereço -->

      <div class="form-group">
        <label for="client-address">Endereço</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"
              ><i class="fas fa-map-marker"></i
            ></span>
          </div>
          <input
            id="client-address"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': errors.address }"
            v-model="form.address"
            placeholder="Rua example, 123"
          />
        </div>
      </div>
      <span class="invalid-feedback">{{ errors.address }}</span>
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
    // Inicializa o Inputmask nos campos de entrada
    $(this.$el).find("#campo1").inputmask("99/99/9999");
    $(this.$el).find("#campo2").inputmask("(99) 9999-9999");

    // Verifica se o campo de entrada 1 está preenchido e mantém o inputmask ativo
    if (this.campo1 !== "") {
      $(this.$el).find("#campo1").inputmask("99/99/9999", { clearIncomplete: false });
    }

    // Verifica se o campo de entrada 2 está preenchido e mantém o inputmask ativo
    if (this.campo2 !== "") {
      $(this.$el).find("#campo2").inputmask("(99) 9999-9999", { clearIncomplete: false });
    }
  },
};
  // mounted() {
  //   $("#client-tel_num").inputmask("(99)99999-9999"),
  //     $("#client-cep").inputmask("99999-999"),
  //     $("#client-cpf").inputmask("999.999.999-99");
  //   this.loadStates();
  // },
  // methods: {
  //   updatePhone() {
  //     this.phone = this.$refs.phone.value;
   
  // },
  // // Função para buscar endereço a partir do CEP
  // async searchCep() {
  //   try {
  //     const response = await axios.get(
  //       `https://viacep.com.br/ws/${this.form.cep}/json/`
  //     );
  //     this.form.state = response.data.uf;
  //     this.form.city = response.data.localidade;
  //     this.form.address = response.data.logradouro;
  //   } catch (error) {
  //     console.log(error);
  //   }
  // },

  // watch: {
  //   selectedState(state) {
  //     if (state) {
  //       this.loadCities(this.states.find((s) => s.sigla === state).id);
  //     } else {
  //       this.cities = [];
  //     }
  //     // Observador para buscar endereço a partir do CEP
  //     "form.cep"(newVal, oldVal);
  //     if (newVal.length === 9) {
  //       this.searchCep();
  //     } else {
  //       this.form.state = "";
  //       this.form.city = "";
  //       this.form.address = "";
  //     }
  //   },
  // },
  // components: {
  //   // Componente para exibir dados do CRUD
  //   Crud,
  // },
  // setup() {
  //   // Hook useForm para lidar com o envio do formulário
  //   const { data, post, processing } = useForm({
  //     name: "",
  //     cpf: "",
  //     email: "",
  //     birth: "",
  //     tel_num: "",
  //     cep: "",
  //     state: "",
  //     city: "",
  //     address: "",
  //   });

  //   // Função para lidar com o envio do formulário
  //   const handleSubmit = (e) => {
  //     e.preventDefault();
  //     post(route("clients.store"), {
  //       onSuccess: () => {
  //         // Função para redirecionar após o envio do formulário
  //         window.location.href = "/clients";
  //       },
  //       onError: (errors) => {
  //         // Setando os erros no objeto de erros
  //         this.errors = errors;
  //       },
  //     });
  //   };

  //   return {
  //     data,
  //     processing,
  //     handleSubmit,
  //   };
  // },
  // }}
</script>
