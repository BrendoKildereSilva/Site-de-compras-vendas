<template>
    <div>
        <div class="container-nomes">
            <div>
                <input 
                type="text" 
                id="input-nome" 
                @keyup="ValidarCampoNome" 
                v-model="nome" required
                class="input-padrao"
                >
                <label 
                for="input-nome"
                class="label-com-animacao"
                >Nome</label>
                <p class="Mensagem-de-erro"> {{ MensagemDeErroNome}} </p>
            </div>

            <div>
                <input 
                type="text" 
                id="input-sobrenome" 
                @keyup="ValidarCampoSobrenome" 
                v-model="sobrenome" required
                class="input-padrao"
                >
                <label 
                for="input-sobrenome" 
                class="label-com-animacao"
                >
                Sobrenome (Opcional)</label>
                <p class="Mensagem-de-erro"> {{ MensagemDeErroSobrenome}} </p>
            </div>

        </div>

        <div class="container-email">
                <input 
                type="text" 
                id="input-email" 
                @keyup="ValidarCampoEmail" 
                v-model="email" required
                class="input-padrao"
                >
                <label 
                for="input-email"
                class="label-com-animacao"
                >Email</label>
                <p class="Mensagem-de-erro"> {{ MensagemDeErroEmail}} </p>
        </div>


        <div class="container-senhas">
            <div>
                <input 
                type="password"
                @keyup.prevent="ValidarCampoSenha" 
                id="input-senha" 
                v-model="senha" 
                required
                class="input-padrao"
                >
                <label
                for="input-senha"
                class="label-com-animacao"
                >
                senha</label>
                <p class="Mensagem-de-erro"> {{ MensagemDeErroSenha}} </p>
            </div>

            <div>
                <input 
                type="password" 
                id="input-confirm-senha" 
                @keyup="ValidarCampoConfirmsenha"
                v-model="confirmsenha" required
                class="input-padrao"
                >
                <label 
                for="input-confirm-senha"
                class="label-com-animacao"
                >confirmar senha</label>
                <p class="Mensagem-de-erro"> {{ MensagemDeErroConfirmsenha}} </p>
            </div>
        </div>

        <div class="container-button">
            <button @click.prevent="HiddenOrShowPassowrd" 
            class="button-padrao-01">
                {{ TextButtonHiddenOrShowPassowrd }}
            </button>
            <button @click.prevent="ProximaEtapa" class="button-padrao-02">Proxima etapa</button>
        </div>

    </div>
</template>

<style lang="scss" scoped>


label{
    transition: 0.2s;
    font-size: 1.4rem;
    position: absolute;
    top: 8px;
    left: 5px;
}

.container-nomes div, .container-senhas div, .container-email{
    position: relative;
}

.container-nomes, .container-senhas{
    margin: 3rem 0rem;
    width: 100%;
    display: flex;
    justify-content: space-between;

    div{
        width: 47%;
    }
}


.Mensagem-de-erro{
    color: $red01;
    font-size: 1.2rem;
}


.container-button{
    margin: 3rem 0rem;
    display: flex;
    justify-content: space-between;
}

@media(max-width: 500px){
    .container-email{
        margin: 1rem 0rem;
    }
    .container-senhas, .container-nomes{
        margin: 0px;
        flex-direction: column;

        div{
            margin: 1rem 0rem;
            width: 100%;
        }
    }
}

</style>



<script>
import axios from 'axios'

export default {
    props:{
        PropsNome: String,
        PropsSobrenome: String,
        PropsEmail: String,
        PropsSenha: String,
        PropsConfirmsenha: String,
        // 
        PropsStatusCampoNome: Boolean,
        PropsStatusCampoSobrenome: Boolean,
        PropsStatusCampoEmail: Boolean,
        PropsStatusCampoSenha: Boolean,
        PropsStatusCampoConfirmsenha: Boolean,
    },

    data(){
        return{
            nome: null,
            sobrenome: null,
            email: null,
            senha:null,
            confirmsenha: null,
            // 
            MensagemDeErroNome: '',
            MensagemDeErroSobrenome: '',
            MensagemDeErroEmail: '',
            MensagemDeErroSenha: '',
            MensagemDeErroConfirmsenha: '',
            // 
            TextButtonHiddenOrShowPassowrd: 'Visualizar senhas',
            // 
            StatusCampoNome: false,
            StatusCampoSobrenome: false,
            StatusCampoEmail: false,
            StatusCampoSenha: false,
            StatusCampoConfirmsenha: false,
            //
            CampoConfirmSenhaAcionado: false,
            EmailJaEstaUso: undefined,
        }
    },

    mounted(){
        this.AtualizarDados();
    },


    methods:{
        ProximaEtapa(){

            if(this.StatusCampoNome && this.StatusCampoSobrenome && this.StatusCampoEmail && this.StatusCampoSenha && this.StatusCampoConfirmsenha){


                var DadosDaEtapa = {
                    "nome" : this.nome,
                    "sobrenome": this.sobrenome,
                    "email": this.email,
                    "senha": this.senha,
                    "confirmsenha": this.confirmsenha,
                    // 
                    "StatusCampoNome": this.StatusCampoNome,
                    "StatusCampoSobrenome": this.StatusCampoSobrenome,
                    "StatusCampoEmail": this.StatusCampoEmail,
                    "StatusCampoSenha": this.StatusCampoSenha,
                    "StatusCampoConfirmsenha": this.StatusCampoConfirmsenha,
                }

                this.$emit('ProximaEtapa', DadosDaEtapa)


            }
            else{
                this.ValidarCampoNome()
                this.ValidarCampoSobrenome();
                this.ValidarCampoEmail();
                this.ValidarCampoSenha();
                this.ValidarCampoConfirmsenha();
            }
        },

        AtualizarDados(){   
    
            this.nome = this.PropsNome
            this.sobrenome = this.PropsSobrenome
            this.email = this.PropsEmail
            this.senha = this.PropsSenha
            this.confirmsenha = this.PropsConfirmsenha
            // 
            this.StatusCampoNome = this.PropsStatusCampoNome
            this.StatusCampoSobrenome = this.PropsStatusCampoSobrenome
            this.StatusCampoEmail = this.PropsStatusCampoEmail
            this.StatusCampoSenha = this.PropsStatusCampoSenha
            this.StatusCampoConfirmsenha = this.PropsStatusCampoConfirmsenha
            // 
            this.CampoConfirmSenhaAcionado = this.PropsCampoConfirmSenhaAcionado
        },
        

        ValidarCampoNome(){
            if(!this.nome){
                this.MensagemDeErroNome = 'Preencha esse campo';
                this.StatusCampoNome = false;
            }
            else if(this.nome.length > 15){
                this.MensagemDeErroNome = 'Insira no máximo 15 caracteres'
                this.StatusCampoNome = false
            }
            else if(!this.RegexMarcarLetrasEnumeroApenas(this.nome)){
                this.MensagemDeErroNome = 'Insira apenas letras';
                this.StatusCampoNome = false;
            }
            else{
                this.MensagemDeErroNome = '';
                this.StatusCampoNome = true;
            }
        },

        ValidarCampoSobrenome(){
            
            if(!this.sobrenome){
                this.MensagemDeErroSobrenome = '';
                this.StatusCampoSobrenome = true;
            }
            else if(!this.RegexMarcarLetrasEnumeroApenas(this.sobrenome)){
                this.MensagemDeErroSobrenome = 'Insira apenas letras';
                this.StatusCampoSobrenome = false;
            }
            else if(this.sobrenome.length > 15){
                this.MensagemDeErroSobrenome = 'No máximo 15 caracteres';
                this.StatusCampoSobrenome = false;
            }
            else{
                this.MensagemDeErroSobrenome = '';
                this.StatusCampoSobrenome = true;
            }
        },

        async  ValidarCampoEmail(){
            let form = new FormData()
            form.append('email', this.email)
            // 
            await axios.post('http://localhost:8080/criar-conta/verificar-email', form
            ).then(Response => { 
                
                if(Response.data == 'Email em uso'){
                    this.EmailJaEstaUso = true
                }
                else
                {
                    this.EmailJaEstaUso = false
                }
             })


            if(!this.email){
                this.MensagemDeErroEmail = 'Preencha esse campo';
                this.StatusCampoEmail = false;
            }
            else if(!this.RegexValidarEmail(this.email)){
                this.MensagemDeErroEmail = 'email invalido';
                this.StatusCampoEmail = false;
            }
            else if(this.EmailJaEstaUso == true){
                this.MensagemDeErroEmail = 'Esse email já estar em uso';
                this.StatusCampoEmail = false;
            }
            else{
                this.MensagemDeErroEmail = '';
                this.StatusCampoEmail = true;
            }
        },


        RegexMarcarLetrasEnumeroApenas(regex){
            const Codregex = /^[a-z-A-Z]+$/;
            return Codregex.test(regex)
        },

        RegexValidarEmail(regex){
            const Codregex = /^[a-z-A-Z-0-9]+\@hotmail.com|^[a-z-A-Z-0-9]+@gmail.com/
            return Codregex.test(regex)
        },

        RegexLETRASMAIUSCULAS(regex){
            var Codregex = /[A-Z]/
            return Codregex.test(regex) 
        },

        RegexLETRASMinusculas(regex){
            var Codregex = /[a-z]/
            return Codregex.test(regex) 
        },

        RegexCaracteresEspeciais(regex){
            var Codregex = /_|\W/
            return Codregex.test(regex) 
        },




        ValidarCampoSenha(){

            if(!this.senha){
                this.MensagemDeErroSenha = 'Preencha esse campo';
                this.StatusCampoSenha = false
            }
            else if(this.senha.length < 6){
                this.MensagemDeErroSenha = 'Insira no mínimo 06 caracteres'
                this.StatusCampoSenha = false
            }
            else if(this.senha.length > 15){
                this.MensagemDeErroSenha = 'Insira no maximo 15 caracteres'
                this.StatusCampoSenha = false
            }
            else if(!this.RegexLETRASMinusculas(this.senha)){
                this.MensagemDeErroSenha = 'Insira no minimo 01 letra minúscula'
                this.StatusCampoSenha = false
            }
            else if(!this.RegexLETRASMAIUSCULAS(this.senha)){
                this.MensagemDeErroSenha = 'Insira no minimo 01 letra maiúscula'
                this.StatusCampoSenha = false
            }
            else if(!this.RegexCaracteresEspeciais(this.senha)){
                this.MensagemDeErroSenha = 'Insira no minimo 01 caractere especial Ex: !@#$%¨&()'
                this.StatusCampoSenha = false
            }
            else{
                this.StatusCampoSenha = true
                this.MensagemDeErroSenha = ''
            }

            if(this.CampoConfirmSenhaAcionado){
                this.ValidarCampoConfirmsenha()
            }
        },

        ValidarCampoConfirmsenha(){
            this.CampoConfirmSenhaAcionado = true

            if(!this.confirmsenha){
                this.MensagemDeErroConfirmsenha = 'Preencha esse campo'
                this.StatusCampoConfirmsenha = false
            }
            else if(this.confirmsenha != this.senha){
                this.StatusCampoConfirmsenha = false
                this.MensagemDeErroConfirmsenha = 'Erro na confirmação de senha!'
            }
            else{
                this.MensagemDeErroConfirmsenha = ''
                this.StatusCampoConfirmsenha = true
            }
        },
        
        
        HiddenOrShowPassowrd(){
            var Inputsenha = document.getElementById('input-senha')
            var TypeAtribute = Inputsenha.getAttribute('type');

            if(TypeAtribute == 'password'){
                document.getElementById('input-senha').setAttribute('type', 'text')
                document.getElementById('input-confirm-senha').setAttribute('type', 'text')
                this.TextButtonHiddenOrShowPassowrd = "Esconder senhas";
            }
            else 
            {
                document.getElementById('input-confirm-senha').setAttribute('type', 'password')
                document.getElementById('input-senha').setAttribute('type', 'password')
                this.TextButtonHiddenOrShowPassowrd = "Visualizar senhas";
            }




            

        }
    }
}
</script>
