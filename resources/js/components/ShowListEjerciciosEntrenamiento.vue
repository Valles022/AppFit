<template >
    <div class="col-lg-12">
        <show-entrenamiento :entrenamiento="entrenamiento" :ejercicios="ejercicios" @clicked="getEjercicios($event)"></show-entrenamiento>
        <listado-ejercicios :entrenamiento="entrenamiento" @clicked="getEjercicios($event)" v-if="visible"></listado-ejercicios>
        <button @click="showEjercicios">Añadir Ejercicio</button>
    </div>
</template>


<script>
import CoShowEntrenamiento from './ShowEntrenamiento.vue'
import CoListEjercicios from './AddEjercicio.vue'

export default {
    name:'CoShowListEjerciciosEntrenamiento',
    props:['entrenamiento','ejercicios','visible'],
    template:'<show-list-ejercicios />',
    methods:{
        getEjercicios: function(entrenamientoid){
            axios.get(`/getEjercicios/${entrenamientoid}`).then(response => {
                this.ejercicios=response.data})
                this.visible = false;
        },
        showEjercicios: function(){
            this.visible = !this.visible;
        }
    },
    components:{
        CoShowEntrenamiento,
        CoListEjercicios
    }
}
</script>>