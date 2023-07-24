<template>
    <div id="container-body">

        <div class="container-main">
            <p>
                Esse conta pertence a você?
            </p>
            <p>
                {{ PropsEmail}}
            </p>

            <img :src="PropsUrlFotoPerfilUser">

            <div class="container-senha">
                <label for="input-senha">senha</label>
                <input 
                type="password" 
                id="input-senha"
                class="input-padrao"
                >
                <button class="button-padrao-01">Entrar</button>
            </div>

            <div class="container-button">
                <button class="button-padrao-02">voltar</button>
            </div>
        </div>

        
    </div>
</template>


<script>
export default {
    props:{
        PropsEmail: String,
        PropsUrlFotoPerfilUser: String
    }
}


</script>

<style  lang="scss" scoped>
    
    .container-main{
        width: 100%;        
        display: flex;
        flex-direction: column;
        align-items: center;
        

    
        p{
            color: $primary01;
        }

        img{
            width: 20rem;
            height: 20rem;
            margin: 2rem;
        }


        .container-senha{
            width: 80%;
            display: flex;
            flex-direction: column;

            label{
                color: $primary01;
            }

            .button-padrao-01{
                width: 50%;
                margin: 1rem auto;
            }
    }

        
}

    .container-button{
        width: 100%;
    }


    @media(max-width: 700px){
        .container-main{

            img{
                width: 30rem;
                height: 30rem;
            }
    }
    }

    @media(max-width: 300px){
        .container-main{

            img{
                width: 20rem;
                height: 20rem;
            }
    }
    }
</style>



