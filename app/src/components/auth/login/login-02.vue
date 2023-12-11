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
                v-model="senha"
                >
                <button class="button-padrao-01" @click.prevent="ButtonEntrar">Entrar</button>
            </div>

            <div class="container-button">
                <button class="button-padrao-02" @click.prevent="Buttonvoltar">voltar</button>
            </div>
        </div>

        
    </div>
</template>


<script>
export default {
    props:{
        PropsEmail: String,
        PropsUrlFotoPerfilUser: String
    },

    data(){
        return{
            senha: undefined,
        }
    },
    
    methods:{
        ButtonEntrar(){
            if(!this.senha){
                this.$emit('MensagemDeErro', 'Preencha o campo')
            }    
            else{
                var DadosDaEtapa = {
                    "email": this.PropsEmail,
                    "senha": this.senha
                }

                this.$emit('ButtonEntrar', DadosDaEtapa)


            }
        },

        
        Buttonvoltar(){
            this.$emit('ButtonVoltar')
        }
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
            color: red;
            text-align: center;
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
                color: red;
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

    @media(max-width: 400px){
        .container-main{

            img{
                width: 20rem;
                height: 20rem;
            }
    }
    }
</style>



