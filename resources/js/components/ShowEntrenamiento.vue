<template>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover">
                <thead>
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
                        <show-ejercicio v-for="ejercicio in ejercicios"
                        :ejercicio="ejercicio"
                        :key="ejercicio.id"
                        :entrenamiento="entrenamiento" @clicked="$emit('clicked',$event);"></show-ejercicio>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import CoShowEjercicio from './ShowEjercicio.vue'

export default {
    name:'CoShowEntrenamiento',
    props:['ejercicios','entrenamiento'],
    template: '<show-entrenamiento/>',
    components:{
        CoShowEjercicio
    }
}
</script>