<template>
    <div>
        <h2>Login</h2>

    <div class="button-padrao-01" v-if="this.ShowMensagemDeErro">
            <p>
             {{ MesangemDeErro }}
            </p>
    </div>
        <Login01 
        v-if="this.LoginComponent1 == true"
        :PropsMesangemDeErro="MesangemDeErro"
        @ButtonEntrar="EmicaoEntrar"
        @MensagemDeErro="EmisaoFunctionMensagemDeErro"
        ></Login01>

        <Login02 
        v-if="this.LoginComponent2 == true"
        :PropsEmail="email"
        :PropsUrlFotoPerfilUser="UrlFotoPerfilUser"


        :PropsMesangemDeErro="MesangemDeErro"
        
        @ButtonVoltar="EmicaoButtonVoltar"
        @MensagemDeErro="EmisaoFunctionMensagemDeErro"
        @ButtonEntrar="EmicaoEntrar"

        ></Login02>
    </div>
</template>


<script>
import Login01 from './login-01.vue';
import Login02 from './login-02.vue';

import axios from 'axios';

export default {
    data(){
        return{
            ShowMensagemDeErro: false,
            MesangemDeErro:'',
            // 
            LoginComponent1: true,
            LoginComponent2: false,
            // 
            // Dados component login 02
            email: '',
            UrlFotoPerfilUser: ''
        }
    },

    methods:{
       
        // Emicao do component LOGIN 02
        EmicaoButtonVoltar(){
            this.LoginComponent1 = true
            this.LoginComponent2 = false
        },

         // Emicao que funciona para ambos components 01 e 02

        EmicaoEntrar(DadosDoCamponent){
        this.email = DadosDoCamponent.email
        let form = new FormData();
        form.append('email', DadosDoCamponent.email);
        form.append('senha', DadosDoCamponent.senha);

        axios.post('http://localhost:8080/login', form).then(Response => {

                var mensagem = Response.data.mensagem
                let url_foto_perfil = Response.data.foto_perfil

                if(mensagem == 'Dados invalidos'){
                    this.MesangemDeErro = mensagem
                    this.ShowMensagemDeErro = true
                }
                else if(mensagem == 'Apenas o email é valido'){
                    this.ShowMensagemDeErro = false
                    
                    this.MesangemDeErro = mensagem
                    this.UrlFotoPerfilUser = url_foto_perfil

                    this.LoginComponent1 = false
                    this.LoginComponent2 = true

                    
                }
                else if(mensagem == 'Dados validos'){
                    var token = Response.data.token
                    localStorage.setItem('token', token)
                    this.$router.push('/')
                }
            })
        },

        EmisaoFunctionMensagemDeErro(Situcao){
            this.ShowMensagemDeErro = true
            this.MesangemDeErro = Situcao
        },
    },

    components:{
        Login01,
        Login02,
    }
}
</script>




<style scoped lang="scss">
h2{
        font-weight: 100;
        font-size: 1.5rem;  
        margin: 1rem 0rem;  
}

.button-padrao-01{
    padding: 0.2rem 0rem;
    margin: 1rem 0rem;
    width: 70%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6rem;

    p{
        text-align: center;
        color: #fff;
    }
}

@media(max-width: 700px){
    .button-padrao-01{
        width: 80%;
    }
}
</style>