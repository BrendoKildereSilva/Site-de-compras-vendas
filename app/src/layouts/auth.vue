<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    mounted(){
        this.TokenProccess();
    },

    methods:{  
        // verificar se o token é valido e resgatar dados dentro do token
        TokenProccess(){
            var form = new FormData();
            var token = localStorage.getItem('token');
            form.append('token', token);

            axios.post('http://localhost:8080/analiza-token', form).then(Reponse => { 
                
                if(Reponse.data.mensagem == 'token valido'){
                    console.log(Reponse.data.dados_user.email)
                }
                else{
                    this.$router.push('/login')
                }
            })

            
            

        }
    }
}
</script>
