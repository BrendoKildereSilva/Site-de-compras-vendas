<template>
    <main>
        <h1> {{ TitleH1 }} </h1>

        <form>
            <Etapa01
            v-if="this.Component01 == true"
            :PropsTitulo="titulo"
            :PropsPreco="preco"
            :PropsDescricao="descricao"

            @ProximaEtapa="EmicaoProximaEtapa"
            ></Etapa01>

            <Etapa-02 
            v-if="this.Component02 == true"
            >
            </Etapa-02>
        </form>
    </main>
</template>




<style scoped lang="scss">
    main{
        width: 100%;
        margin: 0 auto;
    }

    h1{
        font-size: 2rem;
        margin: 1rem;
        text-align: center;
        font-weight: 100;
        color: $cinza01;
    }

    form{
        padding: 5rem 0rem;
        display: flex;
        justify-content: center;
        align-content: center;
        width: 45%;
        margin: 0 auto;
        border-radius: 3rem;
        border: 0.3rem dashed $cinza01;
    }

    @media(max-width:1000px){
        form{
            width: 70%;
        }
    }

    @media(max-width:700px){
        form{
            width: 90%;
        }
    }

    @media(max-width: 300px){
        form{
            padding: 2rem 0rem;
            width: 100%;
            border: 0px;
        }
    }

   
</style>


<script>
import Etapa01 from './etapa-01.vue';
import Etapa02 from './etapa-02.vue';

export default {
    data(){
        return{
            // Modo
            TitleH1: "Criar publição",
            // 
            Component01: false,
            Component02: true,
            Component03: false,
            // dados do component 01
            titulo: "",
            preco: "",
            descricao: "",
        }
    },

    components:{
        Etapa01,
        Etapa02
    },

    methods:{
        EmicaoProximaEtapa(DadosDaEtapa01){

            // Atualizando Dados
            this.titulo = DadosDaEtapa01.titulo
            this.preco = DadosDaEtapa01.preco
            this.descricao = DadosDaEtapa01.descricao

            this.Component01 = false
            this.Component02 = true
            this.Component03 = false


        }
    }
}
</script>