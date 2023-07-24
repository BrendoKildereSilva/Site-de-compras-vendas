
<template>
    <div class="container-main">
        
        <div class="container-inputs">

            <div class="container-email">
                <input 
                type="text" 
                v-model="email"
                class="input-padrao"
                >
                <label for="input-text">E-mail</label>
            </div>

            <div class="container-senha">
                <input 
                ype="password" 
                v-model="senha"
                class="input-padrao"
                >
                <label for="input-text">senha</label>
            </div>

            <div class="container-button">
                <button @click.prevent="Entrar" class="button-padrao-01">Entrar</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            CamposValidos: false,
            email: 'brendo@gmail.com',
            senha: '123@Aa',
        }
    },

    props:{
        PropsMesangemDeErro: String
    },


    methods:{

        Entrar(){
            if(this.email && this.senha){
                let DadosDaEtapa = {
                    'email': this.email,
                    'senha': this.senha
                }

                this.$emit('Entrar', DadosDaEtapa)
            }
            else
            {
                this.$emit('MensagemDeErro', 'Preencha os campos')
            }
        },

    }
}
</script>


<style lang="scss" scoped>
    

    .container-inputs{
        div{
            margin: 3rem 0rem;
            display: flex;
            flex-direction: column-reverse;
        }

    }


    .container-button{
        width: 100%;
        display: flex;
        justify-content: center;

        .button-padrao-01{
            margin: 0 auto;
        }
    }


</style>