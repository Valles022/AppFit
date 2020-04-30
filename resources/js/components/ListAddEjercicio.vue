<template >
    <div class="row justify-content-center">
        <div class="col-lg-12 card" id="listaEjercicios">
            <ul class="pl-0">
                <search-ejercicio></search-ejercicio>
                <li class="list-group-ejercicios">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <td>Imagen</td>
                                <td>Nombre del ejercicio</td>
                                <td>Grupo Muscular</td>
                                <td>Descripcion</td>
                                <td>Nº de series</td>
                                <td>Nº de repeticiones</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <add-ejercicio v-for="ejercicio in listaEjercicios"
                            :ejercicio="ejercicio"
                            :key="ejercicio.id"
                            :entrenamiento="entrenamiento" @clicked="$emit('clicked',$event);"></add-ejercicio>
                        </tbody>
                    </table>  
                </li>  
            </ul>                 
        </div>
    </div>
</template>

<script>
import CoAddEjercicio from './AddEjercicio.vue'
import CoSearchEjercicio from './SearchEjercicio.vue'
import bus from '../busdata.js'

export default {
    name:'CoListEjercicios',
    template:'<listado-ejercicios/>',
    props:['entrenamiento'],
    data(){
        return{
            listaEjercicios: [],
            entrenamientoActual: null
        }
    },
    components:{
        CoAddEjercicio,
        CoSearchEjercicio
    },
    methods:{
        getLista: function(entrenamientoid){
            axios.get(`/getEjercicios`).then(response => {
                this.listaEjercicios=response.data})
        },
    },
    beforeMount(){
        this.getLista();
    },
    mounted(){
        this.entrenamientoActual=this.entrenamiento;
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