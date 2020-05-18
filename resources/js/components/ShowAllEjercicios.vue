<template >
    <div class="row justify-content-center">
        <div class="row col-lg-12 justify-content-around">
            <div>
                <search-ejercicio></search-ejercicio>
            </div>
            <div>
                <h2>Listado de Ejercicios</h2>
            </div>
            <div class="">
                <h2><a class="btn btn-primary" v-if="!cliente" :href="`/createEjercicio`"> Crear Ejercicio</a></h2>
            </div>
        </div>
        <div class="col-lg-11 card w-100" id="listaEjercicios">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <td>Imagen</td>
                        <td>Nombre del ejercicio</td>
                        <td>Grupo Muscular</td>
                        <td>Descripcion</td>
                        <td colspan="2" v-if="!cliente">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="ejercicio in listaEjercicios"
                    :ejercicio="ejercicio"
                    :key="ejercicio.id">
                        <td><img :src="'../images/ejercicios/'+ejercicio.imagen" alt="imagenEjercicio" :style="{ width: 150 + 'px' }"/></td>
                        <td>{{ ejercicio.nombre }}</td>
                        <td>{{ ejercicio.musculo }}</td>
                        <td>{{ ejercicio.descripcion }}</td>
                        <td v-if="!cliente"><a class="btn btn-info" :href="`/editEjercicio/${ejercicio.id}`">Editar</a></td>
                        <td v-if="!cliente"><a class="btn btn-danger" :href="`/deleteEjercicio/${ejercicio.id}`">Borrar</a></td>
                    </tr> 
                </tbody>
            </table>              
        </div>
    </div>
</template>

<script>
import CoSearchEjercicio from './SearchEjercicio.vue'
import bus from '../busdata.js'

export default {
    name:'CoShowAllEjercicios',
    template:'<all-ejercicios/>',
    props:['cliente'],
    data(){
        return{
            listaEjercicios: [],
        }
    },
    components:{
        CoSearchEjercicio
    },
    methods:{
        getLista: function(){
            axios.get(`/getEjercicios`).then(response => {
                this.listaEjercicios=response.data})
        }
    },
    beforeMount(){
        this.getLista();
    },
    mounted(){
        bus.$on('search', criterio => {
            if(criterio==''){
                criterio='+';
            }
            
            axios.get(`/searchEjercicio/${criterio}`).then(response => {
                this.listaEjercicios=response.data})
        });
    }
}
</script>