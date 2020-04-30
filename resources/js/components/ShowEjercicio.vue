<template >
    <tr :ejercici="ejercicio" :entrenamiento="entrenamiento">
        <td><img :src="'../images/ejercicios/'+ejercicio.imagen" alt="imagenEjercicio" :style="{ width: 150 + 'px' }"/></td>
        <td>{{ejercicio.nombre}}</td>
        <td>{{ejercicio.musculo}}</td>
        <td>{{ejercicio.descripcion}}</td>
        <td><input name="num_repes" type="number" v-model.number="series"></td>
        <td><input name="num_repes" type="number" v-model.number="repes"></td>
        <td>
            <button class="btn btn-info" type="button" :style="{width: 100 + 'px'}" v-on:click="saveEjercicio(entrenamiento.id,ejercicio.id)">Save</button>
            <button class="btn btn-danger" type="button" :style="{width: 100 + 'px'}" v-on:click="dropEjercicio(entrenamiento.id,ejercicio.id)">Delete</button>
        </td>
    </tr>  
</template>

<script>

export default {
    name:'CoShowEjercicio',
    template:'<show-ejercicio/>',
    props:['ejercicio','entrenamiento'],
    data(){
        return{
            series: null,
            repes: null
        }
    },
    methods:{
        saveEjercicio: function(entrenamientoid,ejercicioid){
            axios.get(`/saveEjercicio/${entrenamientoid}/${ejercicioid}/${this.series}/${this.repes}`).then(response => {
                alert('Ejercicio modificado correctamente!');
                this.$emit('clicked',entrenamientoid);
            })
        },
        dropEjercicio: function(entrenamientoid,ejercicioid){
            axios.get(`/dropEjercicio/${entrenamientoid}/${ejercicioid}`).then(response => {
                alert('Ejercicio eliminado correctamente!');})
                this.$emit('clicked',entrenamientoid);
        }
    },
    mounted(){
        this.series=this.ejercicio.pivot.num_series;
        this.repes=this.ejercicio.pivot.num_repes;
    }
}
</script>