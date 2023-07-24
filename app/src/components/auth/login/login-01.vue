
<template>
    <div class="container-main">
        
        <div class="container-inputs">

            <div class="container-email">
                <input 
                type="text" 
                required 
                v-model="email"
                class="input-padrao"
                >
                <label for="input-text">E-mail</label>
            </div>

            <div class="container-senha">
                <input 
                ype="password" 
                required 
                v-model="senha"
                class="input-padrao"
                >
                <label for="input-text">senha</label>
            </div>

            <div class="container-button">
                <button @click.prevent="Entrar">Entrar</button>
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

        label{
            color: $primary01;
        }
    }


    .container-button{
        width: 100%;
        border: 0px;

        button{
            margin: 0 auto;
            width: 30%;
            color: #fff;
            border: 0px;
            border-radius: 0.6rem;
            background: transparent;
            height: 3rem;
            background: $primary01;
            cursor: pointer;
            transition: 0.2s;
            
        }

        button:hover{
            transition: 0.2s;
            background: $primary03;
        }
    }


</style>