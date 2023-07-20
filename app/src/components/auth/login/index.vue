<template>
    <div>
        <h2>Login</h2>

    <div class="container-mensagem-de-erro">
            <p>
             {{ MesangemDeErro }}
            </p>
    </div>
        <Login01 
        v-if="this.LoginComponent1 == true"
        :PropsMesangemDeErro="MesangemDeErro"
        @Entrar="EmicaoEntrar"
        @MensagemDeErro="FunctionMensagemDeErro"
        ></Login01>

        <Login02 
        v-if="this.LoginComponent2 == true"
        :PropsEmail="email"
        :PropsUrlFotoPerfilUser="UrlFotoPerfilUser"


        :PropsMesangemDeErro="MesangemDeErro"
        
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
            MesangemDeErro:'',
            // 
            LoginComponent1: true,
            LoginComponent2: true,
            // 
            // Dados component login 02
            email: '',
            UrlFotoPerfilUser: ''
        }
    },

    methods:{
        EmicaoEntrar(DadosDoCamponent){
        this.email = DadosDoCamponent.email
        let form = new FormData();
        form.append('email', DadosDoCamponent.email);
        form.append('senha', DadosDoCamponent.senha);

        axios.post('http://localhost:8080/login', form).then(Response => {

                var mensagem = Response.data.mensagem
                let foto_perfil = Response.data.foto_perfil

                console.log(Response.data)

                if(mensagem == 'Dados invalidos'){
                    this.MesangemDeErro = mensagem
                }
                else if(mensagem == 'Apenas o email é valido'){
                    
                    this.MesangemDeErro = mensagem
                    this.UrlFotoPerfilUser = foto_perfil

                    this.LoginComponent1 = false
                    this.LoginComponent2 = true

                    
                }
                else if(mensagem == 'Dados validos'){
                    this.MesangemDeErro = mensagem
                }
            })
        },

        FunctionMensagemDeErro(Situcao){
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

.container-mensagem-de-erro{
    background: $primary01;
    width: 40%;
    margin: 0 auto;
    padding: 1rem;
    border-radius: 6rem;

    p{
        text-align: center;
        color: #fff;
    }
}
</style>