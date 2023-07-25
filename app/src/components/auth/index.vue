<template>
    <div id="body">
            <form>
                    <h1>SHOP</h1>
                    <nav>
                        <router-link to="/login">Entrar</router-link>
                        <router-link to="/criar-conta">Criar conta</router-link>
                    </nav>
                    <router-view></router-view>

            </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    
    mounted(){
        this.Verificando();
    },

    methods:{

        // Verificando se o user já estar autentificado
        Verificando(){
            var token = localStorage.getItem('token');


            if(token){
                var form = new FormData();
                form.append('token', token);

                axios.post('http://localhost:8080/analiza-token', form).then(Reponse => { 

                    if(Reponse.data.mensagem == 'token valido'){
                        this.$router.push('/');
                    }
                })
            }
        }    
    }
}
</script>


<style lang="scss" scoped>
#body{
    height: 100vh;
    width: 100vw;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(-30deg, #558ed390 10%, rgba(240, 228, 228, 0) 30%), url('@public/imagens/auth/background.jpg');
    background-position: center;
    background-size: cover;
}



    form{
        position: relative;
        padding: 3rem 2rem;
        width: 30%;
        max-height: 85%;
        overflow: auto;
        border-radius: 3rem;
        background: #fff;
        box-shadow: 1px 1px 2px 1px #00000090;

        display: flex;
        flex-direction: column;
        justify-content: center;

        h1{
            text-align: center;
            color: $primary01;
            font-size: 3rem;
        }


        nav {
            width: 100%;
            display: flex;

            a{
                font-size: 1.5rem;
                text-align: center;
                width: 50%;
                color: $primary02;
                border-bottom: 0.2rem solid $primary02;
            }

            a.router-link-exact-active{
                color: $primary01;
                border-bottom: 0.2rem solid $primary01;

            }
        }
    }







@media(max-width: 960px){
    form{
        width: 50%;
        padding: 5rem 2rem;
    }
}

@media(max-width: 700px){
    form{
        padding: 0.4rem 0.4rem;
        width: 100%;
        height: 100%;
        max-height: 100%;
        border-radius: 0px;

        justify-content: start;
    }
}

@media(max-height: 500px){
form{
    padding: 1rem 1rem;
    width: 80%;
    height: 80%;
    max-height: 80%;
    border-radius: 5rem;


    justify-content: start;
} 
}







    










</style>
