<template>
    <div class="container-main">
        <div class="container-inputs">

                <div class="container-titulo-e-preco">

                    <div class="container-titulo">
                        <label class="label-padrao">Titulo</label>
                        <input  type="text" class="input-padrao"
                        v-model="titulo"
                        @keyup="ValidarCampoTitulo"
                        >
                        <p class="mensagem-de-erro"> {{ MensagemDeErroCampoTitulo }}</p>
                    </div>

                    <div class="container-preco">
                        <label class="label-padrao">preço</label>
                        <input type="text" class="input-padrao"
                        v-model="preco"
                        @keyup="ValidarCampoPreco"
                        >
                        <p class="mensagem-de-erro"> {{ MensagemDeErroCampoPreco }}</p>
                        
                        <div class="mensagem-de-erro-secundaria-preco" v-if="this.MensagemDeErroSecundariaCampoPreco == true">
                            Formatos valido: <br/>
                            10 reais - 10,00 <br/>
                            1 000 reais - 1.000,00 <br/>
                            10 000 reais - 10.000,00 
                        </div>

                    </div>
                </div>

                <div class="container-descricao">
                        <label class="label-padrao">Descricao</label>

                        <div class="input-padrao">
                            <span contenteditable="true" 
                            id="value-descricao" @keyup="ValidarCampoDescricao"
                            ></span>
                        </div>

                        <p class="mensagem-de-erro"> {{ MensagemDeErroCampoDescricao }}</p>
                </div>
    
        </div>

        <div class="container-button">
            <button 
            class="button-padrao-01"
            @click.prevent="ProximaEtapa"
            >Proxima etapa</button>
        </div>
    </div>
</template>


<script>
export default {
    data(){
        return{
            titulo: "",
            preco: "",
            descricao:"",
            // 
            MensagemDeErroCampoTitulo: "",
            MensagemDeErroCampoPreco: "",
            MensagemDeErroCampoDescricao: "",
            MensagemDeErroSecundariaCampoPreco: false,
            // 
            StatusCampoTitulo: false,
            StatusCampoPreco: false,
            StatusCampoDescricao: false
        }
    },

    props:{
        PropsTitulo: String,
        PropsPreco: String,
        PropsDescricao: String,
    },

    mounted(){
        this.AtualizarDadosProps();
    },

    methods:{
        ValidarCampoTitulo(){
            if(!this.titulo){
                this.StatusCampoTitulo = false
                this.MensagemDeErroCampoTitulo = "Preencha esse campo"
            }
            else{
                this.StatusCampoTitulo = true
                this.MensagemDeErroCampoTitulo = ""
            }
        },

        ValidarCampoPreco(){
            this.MensagemDeErroSecundariaCampoPreco = false

             if(!this.preco){
                this.StatusCampoPreco = false
                this.MensagemDeErroCampoPreco = "Preencha esse campo"
            }
            else if(this.preco.length > 10){
                this.StatusCampoPreco = false
                this.MensagemDeErroCampoPreco = "Insira no maximo 10 caracteres"
            }
            else if(!this.RegexPadraoInputPreco(this.preco)){
                this.StatusCampoPreco = false
                this.MensagemDeErroCampoPreco = ""
                this.MensagemDeErroSecundariaCampoPreco = true
            }
            else{
                this.StatusCampoPreco = true
                this.MensagemDeErroCampoPreco = ""
            }
        },

        ValidarCampoDescricao(){
            var valueDescricao = document.getElementById('value-descricao').innerText
            this.descricao = valueDescricao 

            if(!this.descricao){
                this.MensagemDeErroCampoDescricao = "Preencha esse campo"
                this.StatusCampoDescricao = false
            }
            else if(this.descricao.length > 2000){
                this.MensagemDeErroCampoDescricao = "Insira no maximo 2000 caracteres"
                this.StatusCampoDescricao = false
            }
            else{
               this.MensagemDeErroCampoDescricao = ""
                this.StatusCampoDescricao = true
            }
        },

        RegexPadraoInputPreco(Value){
            var regex = /^\d{0,3}\.\d{3}\,\d{2}$|^\d{0,3}\,\d{2}$/
            return regex.test(Value)
        },

        AtualizarDadosProps(){
            this.titulo = this.PropsTitulo
            this.preco = this.PropsPreco
            document.getElementById('value-descricao').innerText = this.PropsDescricao
        },


        ProximaEtapa(){
            var DadosDaEtapa = {
                "titulo": this.titulo,
                "preco": this.preco,
                "descricao": this.descricao
            }

            this.$emit('ProximaEtapa', DadosDaEtapa)
            
        }
    }

    
}
</script>

<style lang="scss" scoped>
    .container-main{
        width: 80%;
    }
    
    .container-inputs{
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        
    }

    .container-titulo-e-preco{
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;

        div{
            width: 47%;
        }

        .mensagem-de-erro-secundaria-preco{
            width: 100%;
            font-size: 1.3rem;
            color: $red01;
        }
    }

    .container-descricao{
        .input-padrao{
            overflow: auto;
            height: 20rem;
        }

        span{
            outline: none;
        }
    }

    .container-button{
        margin: 2rem 0rem;
        display: flex;
        justify-content: flex-end;
    }


    @media(max-width: 700px){
       .container-titulo-e-preco{
        margin-bottom: 0rem;
        display: flex;
        flex-direction: column;

        div{
            margin-bottom: 1rem;

            width: 100%;
        }
    } 

    @media(max-width:300px){
        .container-main{
        width: 90%;
        height: 50%;
    }
    }
    }
    
</style>