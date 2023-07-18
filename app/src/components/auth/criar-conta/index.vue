<template>
    <div>
        <h2>Criar conta</h2>
        <etapa-01
        v-if="this.Etapa01Ativado == true"
        :PropsNome="nome"
        :PropsSobrenome="sobrenome"
        :PropsEmail="email"
        :PropsSenha="senha"
        :PropsConfirmsenha="confirmsenha"

        :PropsStatusCampoNome="StatusCampoNome"
        :PropsStatusCampoSobrenome="StatusCampoSobrenome"
        :PropsStatusCampoEmail="StatusCampoEmail"
        :PropsStatusCampoSenha="StatusCampoSenha"
        :PropsStatusCampoConfirmsenha="StatusCampoConfirmsenha"

        :PropsCampoConfirmSenhaAcionado="CampoConfirmSenhaAcionado"

        @ProximaEtapa="EmicaoEtapa01ProximaEtapa"

        ></etapa-01>

        <etapa-02 v-if="this.Etapa02Ativado"
        @VoltarEtapa="EmicaoVoltarEtapa02"

        :PropsExisteImagem="ExisteImagem"
        :PropsFileImagem="FileImagem"
        :PropsURLPreview="URLPreview"


        @CriarConta="EmicaoCriarConta"
        >
        </etapa-02>

    </div>
</template>

<style scoped>
h2{
    font-weight: 100;
    font-size: 1.5rem;
    padding: 0.5rem 0rem;
}

</style>


<script>
import axios from 'axios'
import Etapa01 from './etapa-01.vue';
import Etapa02 from './etapa-02.vue';

export default {
    components:{
        Etapa01,
        Etapa02
    },

    data(){
        return{
            // Etapas
            Etapa01Ativado: true,
            Etapa02Ativado: false,
            // Dados da etapa01
            nome: '',
            sobrenome: '',
            email: '',
            senha: '',
            confirmsenha: '',
            // 
            StatusCampoNome: false,
            StatusCampoSobrenome: false,
            StatusCampoEmail: false,
            StatusCampoSenha: false,
            StatusCampoConfirmsenha: false,
            // 
            CampoConfirmSenhaAcionado: false,
            // Dados da etapa02
            ExisteImagem: false,
            FileImagem: null,
            URLPreview: null

        }
    },


    methods:{
        EmicaoEtapa01ProximaEtapa(DadosEtapa01){

            this.nome = DadosEtapa01.nome
            this.sobrenome = DadosEtapa01.sobrenome
            this.email = DadosEtapa01.email
            this.senha = DadosEtapa01.senha
            this.confirmsenha = DadosEtapa01.confirmsenha
            // 
            this.StatusCampoNome = DadosEtapa01.StatusCampoNome
            this.StatusCampoSobrenome = DadosEtapa01.StatusCampoSobrenome
            this.StatusCampoEmail = DadosEtapa01.StatusCampoEmail
            this.StatusCampoSenha = DadosEtapa01.StatusCampoSenha
            this.StatusCampoConfirmsenha = DadosEtapa01.StatusCampoConfirmsenha

            

            this.Etapa01Ativado = false
            this.Etapa02Ativado = true
        },

         EmicaoVoltarEtapa02(DadosEtapa02){
            this.Etapa01Ativado = true
            this.Etapa02Ativado = false

            this.ExisteImagem = DadosEtapa02.ExisteImagem
            this.FileImagem = DadosEtapa02.FileImagem
            this.URLPreview = DadosEtapa02.URLPreview
         },


        EmicaoCriarConta(FileImagem){
            let form = new FormData();


            form.append('nome', this.nome)
            form.append('sobrenome', this.sobrenome)
            form.append('email', this.email)
            form.append('senha', this.senha)
            form.append('foto_perfil', FileImagem)

            axios.post('http://localhost:8080/criar-conta', form).then(Response => { console.log( Response.data )})

            this.$router.push('/login')

        }






    },

   
}
</script>