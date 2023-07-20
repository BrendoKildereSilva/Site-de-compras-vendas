<template>
    <div class="container-main">
        <p>
            Esse conta pertence a você?
        </p>
        <p>
            {{ PropsEmail}}
        </p>

        <img :src="PropsUrlFotoPerfilUser">

        <div class="container-senha">
            <input type="password" id="input-senha">
            <label for="input-senha">senha</label>
        </div>

        <div class="container-button">
            <button>voltar</button>
            <button>Entrar</button>
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
        background: red;
        
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
            display: flex;
            flex-direction: column-reverse;
            width: 20rem;
            height: 3rem;
        }
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



