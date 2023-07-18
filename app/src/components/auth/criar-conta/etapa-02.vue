<template>
    <div class="container-main">

            
            <p v-if="this.ExisteImagem == false" >Que tal adicionar uma foto? 😎</p>
            <div class="preview-imagem"> 
                <img :src="URLPreview">
            </div>


            <input type="file" 
            ref="InputFile"
            @change="RenderizarImagem" 
            id="input-file"
            >

            <label 
            v-if="this.ExisteImagem == false"
            for="input-file"
            >Adicionar foto
            </label>

            <label 
            v-else
            @click.prevent="ExcluirImagem"
            >Exlucir imagem
            </label>

            <p class="mensagem-de-erro">
                {{ MenasagemDeErro}}
            </p>

            <div class="container-button">
                <button @click.prevent="VoltarEtapa">voltar</button>
                <button @click.prevent="EmicaoCriarConta" class="criar-conta">Criar conta</button>
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



.container-main{
    margin: 0 auto;
    display: flex;
    width: 100%;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    p{
        color: $primary01;
        text-align: center;
    }
    .preview-imagem{
        width: 16rem;
        height: 16rem;
        border: 0.1rem dashed $primary01;
        border-radius: 50%;
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

    label{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        background: linear-gradient(267deg, $primary01 0%, $primary02 100%);
        border-radius: 3rem;
        color: #fff;
        cursor: pointer;
        height: 3rem;
    }

    label:hover{
        background: linear-gradient(267deg, $primary03 0%, $primary02 100%);
    }

    .mensagem-de-erro{
        color: $red01;
        font-size: 1.5rem;  
    }

    .container-button{
        margin: 4rem 0rem 0rem 0rem;
        display: flex;
        width: 100%;
        justify-content: space-between;

        button{
            font-size: 1.5rem;
            background: transparent;
            border: 0px;
            cursor: pointer;
            color: $cinza01;
        }

        button:hover{
            color: $primary02;
        }

        .criar-conta{
            font-size:1.5rem;
            color: #fff;
            border-radius: 1rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(267deg, $primary01 0%, $primary02 100%);

        }

        .criar-conta:hover{
            color: #fff;
            background: linear-gradient(267deg, $primary03 0%, $primary02 100%);

        }
    }

    
}


@media(max-width: 960px){
    .container-main{
        width: 50%;
    }
}

@media(max-width: 700px){
    .container-main{
        width: 100%;
    }
}


</style>