<template>
    <div>
        <Header></Header>
        <router-view></router-view>
    </div>
</template>

<script>
import Header from './components/auth/Header.vue'
import axios from 'axios';
export default {

    data(){
        return{
            token: ""
        }
    },

    components:{
        Header
    },

    mounted(){
        this.token = localStorage.getItem('token')
        window.addEventListener('storage', this.functionWatchToken)
        this.ValidarToken();
    },


    methods:{  
        // se o token for alterado, desconectar o user
        functionWatchToken(){
            localStorage.removeItem('token')
            this.$router.push('/login')
        },

        // verificar se o token é valido e resgatar dados dentro do token
        ValidarToken(){
            var form = new FormData();
            form.append('token', this.token);

            axios.post('http://localhost:8080/analiza-token', form).then(Reponse => { 
                
                if(Reponse.data.mensagem == 'token valido'){
                    console.log(Reponse.data)
                    // Adicionado os dados padrão do user ao veu ex
                    this.$store.state.nome_user = Reponse.data.dados_user.nome;
                    this.$store.state.sobrenome_user = Reponse.data.dados_user.sobrenome;
                    this.$store.state.email_user = Reponse.data.dados_user.email;
                    this.$store.state.url_foto_perfil_user = Reponse.data.dados_user.url_foto_perfil;

                }
                else{
                    this.$router.push('/login')
                }
            })   
        }
    }
}
</script>
