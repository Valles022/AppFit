<template >
    <div class="row justify-content-center">
        <div class="col-lg-12 card" id="listaEjercicios">
            <ul class=" card-body list-group list-group-ejercicios">
                <li class="list-group-item" v-for="entrenamiento in entrenamientos"
                :entrenamiento="entrenamiento"
                :key="entrenamiento.id"
                v-on:click="changeEntrenamiento(entrenamiento.id,user.id)">
                 <b>Tipo Entrenamiento:</b>{{ entrenamiento.tipo_entrenamiento }}   <b>Descripción:</b>{{ entrenamiento.descripcion }}                         
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CoListEntrenamientos',
    props:['entrenamientos','user'],
    template: '<listado-entrenamientos />',
    methods:{
        changeEntrenamiento: function(entrenamientoid,userid){
            axios.get(`/asignEntrenamiento/${entrenamientoid}/${userid}`).then(response => {
                alert('Entrenamiento modificado correctamente!');
                this.$emit('clicked');
            })
        }
    }
}
</script>