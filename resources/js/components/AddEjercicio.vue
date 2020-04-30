<template >
    <tr :ejercici="ejercicio" :entrenamiento="entrenamiento">
        <td><img :src="'../images/ejercicios/'+ejercicio.imagen" alt="imagenEjercicio" :style="{ width: 150 + 'px' }"/></td>
        <td>{{ ejercicio.nombre }}</td>
        <td>{{ ejercicio.musculo }}</td>
        <td>{{ ejercicio.descripcion }}</td>
        <td><input name="num_series" type="number" v-model="num_series"></td>
        <td><input name="num_repes" type="number" v-model="num_repes"></td>
        <td><button type="button" class="btn btn-info" v-on:click="addEjercicio(entrenamiento.id,ejercicio.id,num_series,num_repes)">Añadir</button></td>
    </tr>  
</template>

<script>

export default {
    name:'CoAddEjercicio',
    template:'<add-ejercicio/>',
    props:['ejercicio','entrenamiento'],
    data :function(){
        return{
            num_series: 0,
            num_repes: 0
        }
    },
    methods:{
        addEjercicio: function(entrenamientoid,ejercicioid,num_series,num_repes){
            axios.get(`/addEjercicio/${entrenamientoid}/${ejercicioid}/${num_series}/${num_repes}`).then(response => {
                alert('Ejercicio añadido correctamente!');
                this.$emit('clicked',entrenamientoid);
            })
        }
    }
}
</script>