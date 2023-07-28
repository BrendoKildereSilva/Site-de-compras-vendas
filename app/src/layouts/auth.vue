<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
import axios from 'axios';
export default {

    data(){
        return{
            token: ""
        }
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
                    
                    // Adicionado os dados padrão do user ao veu ex
                    this.$store.state.nome_user = Reponse.data.dados_user[0].nome;
                    this.$store.state.sobrenome_user = Reponse.data.dados_user[0].sobrenome;
                    this.$store.state.email_user = Reponse.data.dados_user[0].email;
                    this.$store.state.foto_perfil_user = Reponse.data.dados_user[0].foto_perfil;

                }
                else{
                    this.$router.push('/login')
                }
            })   
        }
    }
}
</script>
