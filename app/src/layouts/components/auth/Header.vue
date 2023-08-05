<template>
    <header>
        <nav>
            <router-link to="/">
                <img src="@public/imagens/layouts/auth/logo.png" alt="logo">
            </router-link>

                <button @click.prevent="AbrirEFecharContainerMaisOpcao">
                    <img src="@public/imagens/layouts/auth/icon-main-opção.svg" alt="mais opção">
                </button>
        </nav>

        <div class="container-mais-opcao" id="container-mais-option" 
        v-if="this.ContainerMaisOpcao == true"
        >
            <div class="container-opcaos" id="container-opcaos">

                <button @click.prevent="AbrirEFecharContainerMaisOpcao">
                    <svg class="svg-icon" viewBox="0 0 20 20" width="20" height="20">
                    <path class="svg"  d="M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0
                    L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109
                    c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483
                    c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788
                    S18.707,9.212,18.271,9.212z"></path>
                </svg>
                    <span>
                        voltar
                    </span>
                </button>

                <router-link to="#">
                    <img :src="this.$store.state.url_foto_perfil_user">
                    <span>
                        Perfil
                    </span>
                </router-link>

                <router-link to="/publicar">
                    <svg class="svg-icon" viewBox="0 0 20 20" width="20" height="20">
							<path class="svg" fill="none" d="M8.416,3.943l1.12-1.12v9.031c0,0.257,0.208,0.464,0.464,0.464c0.256,0,0.464-0.207,0.464-0.464V2.823l1.12,1.12c0.182,0.182,0.476,0.182,0.656,0c0.182-0.181,0.182-0.475,0-0.656l-1.744-1.745c-0.018-0.081-0.048-0.16-0.112-0.224C10.279,1.214,10.137,1.177,10,1.194c-0.137-0.017-0.279,0.02-0.384,0.125C9.551,1.384,9.518,1.465,9.499,1.548L7.76,3.288c-0.182,0.181-0.182,0.475,0,0.656C7.941,4.125,8.234,4.125,8.416,3.943z M15.569,6.286h-2.32v0.928h2.32c0.512,0,0.928,0.416,0.928,0.928v8.817c0,0.513-0.416,0.929-0.928,0.929H4.432c-0.513,0-0.928-0.416-0.928-0.929V8.142c0-0.513,0.416-0.928,0.928-0.928h2.32V6.286h-2.32c-1.025,0-1.856,0.831-1.856,1.856v8.817c0,1.025,0.832,1.856,1.856,1.856h11.138c1.024,0,1.855-0.831,1.855-1.856V8.142C17.425,7.117,16.594,6.286,15.569,6.286z"></path>
						</svg>
                    <span>
                        publicar
                    </span>
                </router-link>
                <button @click.prevent="Sair">
                    <svg class="svg-icon" viewBox="0 0 20 20"  width="20" height="20" >
							<path class="svg"   d="M13.53,2.238c-0.389-0.164-0.844,0.017-1.01,0.41c-0.166,0.391,0.018,0.845,0.411,1.01
								c2.792,1.181,4.598,3.904,4.6,6.937c0,4.152-3.378,7.529-7.53,7.529c-4.151,0-7.529-3.377-7.529-7.529
								C2.469,7.591,4.251,4.878,7.01,3.683C7.401,3.515,7.58,3.06,7.412,2.67c-0.17-0.392-0.624-0.571-1.014-0.402
								c-3.325,1.44-5.472,4.708-5.47,8.327c0,5.002,4.069,9.071,9.071,9.071c5.003,0,9.073-4.07,9.073-9.071
								C19.07,6.939,16.895,3.659,13.53,2.238z"></path>
							<path class="svg" d="M9.999,7.616c0.426,0,0.771-0.345,0.771-0.771v-5.74c0-0.426-0.345-0.771-0.771-0.771
                            c-0.427,0-0.771,0.345-0.771,0.771v5.74C9.228,7.271,9.573,7.616,9.999,7.616z"></path>
                        </svg>
                        <span>
                            sair
                        </span>
                </button>
            </div>
        </div>
    </header>
</template>


<style lang="scss" scoped>
    
    header{
        padding: 1rem 0rem;
        background: $primary01;

        a, button{
            cursor: pointer;
        }

        nav{
            margin: 0 auto;
            width: 70%;
            display: flex;
            justify-content: space-between;
            align-items: center;

            img{
                height: 3rem;
            }

                a{
                    margin-right: 3rem;
                }

                    
                button{
                    border: 0px;
                    background: transparent;

                    img{
                        height: 2rem;
                    }

                    
                }
        }

        .container-mais-opcao{
            background: #ffffff90;
            height: 100vh;
            width: 100vw;
            position: absolute;
            display: flex;
            top: 0px;
            justify-content: flex-end;

            .container-opcaos{
                position: absolute;
                background: #fff;
                height: 100vh;
                width: 20vw;
                border-left: 1px solid #00000030;
                display: flex;
                flex-direction: column;

                

                button, a{
                    display: flex;
                    align-items: center;
                    font-size: 1.5rem;
                    background: transparent;
                    border: 0px;
                    padding: 1rem 0.5rem;

                    img{
                        height: 4rem;
                        width: 4rem;
                        border-radius: 50%;
                        border: 0.1rem solid $primary01;
                    }
                    .svg{
                        fill: $primary01;
                    }

                    span{
                        color: $primary01;
                        margin-left: 0.5rem;
                    }
                }

               

                button:hover,
                a:hover{
                    background: $primary01;
                    img{
                        border: 0.1rem solid #fff;
                    }
                    .svg{
                        fill: #fff
                    }

                    span{
                        color:#Fff; 
                    }
                }
            }
        }
    }


    @media(max-width: 1000px){
        header{
            .container-mais-opcao{
                .container-opcaos{
                    width: 30vw;
                }
            }
            nav{
                width: 90%;
            }
        }
    }

    @media(max-width: 700px){
        header{
            .container-mais-opcao{
                .container-opcaos{
                    width: 50vw;
                }
            }

        }  
    }
    
    @media(max-width: 300px){
        header{
            .container-mais-opcao{
                .container-opcaos{
                    width: 100vw;
                }
            }

        }  
    }

    
</style>



<script>
export default {
    data(){
        return{
            ContainerMaisOpcao: false
        }
    },

    mounted(){
        this.FecharContainerMaisOpcaoAoClicarForaDele()
    },

    methods:{
        AbrirEFecharContainerMaisOpcao(){

            if(this.ContainerMaisOpcao == false){
               
                this.ContainerMaisOpcao = true
            }else{
               
                this.ContainerMaisOpcao = false
            }

            


        },

        FecharContainerMaisOpcaoAoClicarForaDele(){
            document.addEventListener('mouseup', (e) => {
                if(this.ContainerMaisOpcao == true){

                    if(e.target.id == 'container-mais-option'){
                        this.ContainerMaisOpcao = false
                    }
                }
            })
        },

        Sair(){
            localStorage.removeItem('token')
            this.$router.push('/login')
        },
    }
}
</script>
