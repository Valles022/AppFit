<template>
    <input name="search" type="text" placeholder="Buscar Ejercicio" v-model="criterio">
</template>




<script>
import bus from '../busdata.js';

export default {
    name:'CoSearch',
    data(){
        return{
            criterio:''
        }
    },
    watch:{
        criterio(){
            bus.$emit('search', this.criterio);
        }
    }
}
</script>