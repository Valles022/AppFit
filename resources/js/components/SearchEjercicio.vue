<template>
    <div class="container1">
        <span class="icon"><i class="fa fa-search"></i></span>
        <input id="search" name="search" type="text" placeholder="Buscar Ejercicio" v-model="criterio">
    </div>
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

<style>
.container1{
  width: 300px;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;
}

.container1 input#search{
  width: 300px;
  height: 50px;
  background: #2b303b;
  border: none;
  font-size: 1rem;
  float: left;
  color: #63717f;
  padding-left: 45px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.container1 .icon{
  position: absolute;
  margin-left: 17px;
  margin-top: 14px;
  z-index: 1;
  color: #4f5b66;
}
</style>