<template>
<div id="container-body">
    <div class="container-main">

            
            <p v-if="this.ExisteImagem == false" >Que tal adicionar uma foto? 😎</p>
            <div class="preview-imagem"> 
                <img :src="URLPreview" v-if="this.ExisteImagem == true">
            </div>


            <input type="file" 
            ref="InputFile"
            @change="RenderizarImagem" 
            id="input-file"
            >

            <label 
            v-if="this.ExisteImagem == false"
            for="input-file"
            class="button-padrao-01"
            >Adicionar foto
            </label>

            <label 
            v-else
            class="button-padrao-01"
            @click.prevent="ExcluirImagem"
            >Exlucir imagem
            </label>

            <p class="mensagem-de-erro">
                {{ MenasagemDeErro}}
            </p>
        </div>

        <div class="container-button">
                <button @click.prevent="VoltarEtapa" class="button-padrao-02">voltar</button>
                <button @click.prevent="EmicaoCriarConta" class="button-padrao-01">Criar conta</button>
        </div> 

        

</div>

</template>


<script>

export default {

    data(){
        return{
            ExisteImagem: false,
            FileImagem: null,
            MenasagemDeErro: '',
            URLPreview: null,

        }
    },

   

    props: {
        PropsExisteImagem: Boolean,
        PropsFileImagem: Array,
        PropsURLPreview: String
    },

    mounted(){
        this.AtualizarDados();
    },



    methods:{
        EmicaoCriarConta(){
            this.$emit('CriarConta', this.FileImagem)
        },

        AtualizarDados(){
           this.URLPreview = this.PropsURLPreview
           this.FileImagem = this.PropsFileImagem
           this.ExisteImagem = this.PropsExisteImagem

        },

        VoltarEtapa(){
            let DadosDaEtapa = {
                "ExisteImagem": this.ExisteImagem,
                "FileImagem": this.FileImagem,
                "URLPreview": this.URLPreview
            }

            this.$emit("VoltarEtapa", DadosDaEtapa)
        },

        RenderizarImagem(e){
           let ExtensaoImg = this.$refs.InputFile.files[0].name.slice(-4).toLowerCase()
           let SizeImg = this.$refs.InputFile.files[0].size


           if(!this.$refs.InputFile.files[0]){
             this.MenasagemDeErro = 'Tente novamente!';
           }
           else if(ExtensaoImg != '.jpg' &&  ExtensaoImg != '.png'){
             this.MenasagemDeErro = 'Apenas fotos jpg e png';
           }
           else if(SizeImg > 1500000){
             this.MenasagemDeErro = 'Imagem grande de mais...';

           }
           else{
                let Reader = new FileReader();

                Reader.onload = () => {   
                    this.URLPreview = Reader.result
                }

                Reader.readAsDataURL(e.target.files[0])
                this.ExisteImagem = true
                this.FileImagem = this.$refs.InputFile.files[0]
                document.getElementById('input-file').value = ""
           }
        },

        ExcluirImagem(){
            document.getElementById('input-file').value = ""
            this.ExisteImagem = false
            this.FileImagem = null
            this.URLPreview = null
        }
    }
}
</script>


<style lang="scss" scoped>


#container-body{
    width: 100%;
}

.container-main{
    width: 90%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    p{
        color: red;
        text-align: center;
    }
    .preview-imagem{
        margin: 1rem 0rem;
        width: 20rem;
        height: 20rem;
        border: 0.1rem dashed red;
        margin-bottom: 1rem;
        overflow: hidden;
        display: flex;

        img{
            height: 100%;
            width: 100%;
        }
    }

    input{
        display: none;
    }


    .button-padrao-01{
        display: flex;
        justify-content: center;
        align-items: center;

        height: 2.5rem;
        border-radius: 10rem;
        width: 100%;
    }

    .mensagem-de-erro{
        color: red;
        font-size: 1.5rem;  
    }
}

.container-button{
    margin: 1rem 0rem;
    display: flex;
    justify-content: space-between;

    .button-padra01{
        width: 9rem;
    }
}


@media(max-width: 960px){
    .container-main{
        width: 100%;

    }
}

@media(max-width: 700px){
    .container-main{
        width: 90%;

        .preview-imagem{
            height: 30rem;
            width: 30rem;
        }
    }
}

@media(max-width: 350px){
    .container-main{

        .preview-imagem{
            height: 20rem;
            width: 20rem;
        }
    }
}


</style>