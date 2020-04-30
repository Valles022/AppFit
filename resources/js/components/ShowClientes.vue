<template >
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Email</td>
                        <td>Objetivo</td>
                        <td>Entrenamiento</td>
                        <td>Acción</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="text-center" v-for="cliente in clientes"
                    :cliente="cliente"
                    :key="cliente.id">
                        <td>{{cliente.id}}</td>
                        <td>{{cliente.name}}</td>
                        <td>{{cliente.email}}</td>
                        <td>{{cliente.objetivo}}</td>
                        <td v-if="cliente.entrenamiento == null">Ninguno</td>
                        <td v-else>{{cliente.entrenamiento.tipo_entrenamiento}}</td>
                        <td><button @click="showEntrenamientos(cliente)">Seleccionar Entrenamiento</button></td>
                    </tr>
                    <tr v-if="visible">
                        <td colspan="6"><listado-entrenamientos :entrenamientos="entrenamientos" :user="userClicked" @clicked="getClientes()"></listado-entrenamientos></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import CoListEntrenamientos from './ListEntrenamientos.vue'

export default {
    name:'CoShowClientes',
    template:'<show-clientes/>',
    data: function(){
        return{
            clientes:[],
            entrenamientos:[],
            visible:false,
            userClicked: null,
        }
    },
    components:{
        CoListEntrenamientos
    },
    methods:{
        showEntrenamientos: function(cliente){
            this.visible = !this.visible;
            this.userClicked = cliente;
        },
        getClientes: function(){
            axios.get(`/getClientes`).then(response => {
                this.clientes = response.data;
                this.visible = false;
            })
        },
        getEntrenamientos: function(){
            axios.get(`/getEntrenamientos`).then(response => {
                this.entrenamientos = response.data;
            })
        }
    },
    created:function(){
        this.getClientes();
        this.getEntrenamientos();
    }
}
</script>