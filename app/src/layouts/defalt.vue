<template>
    <div>
        <router-view></router-view>
    </div>
</template>



<style lang="scss">
// Classes Padõp
    .input-padrao{
        outline: none;
        height: 3rem;
        width: 100%;
        padding: 0.1rem;
        border: 0px;
        border: 0.1rem solid $primary01;
        border-radius: 0.6rem;
        transition: 0.4s;
        color: #707070;
    }   

        .input-padrao:focus{
        border: 0.1rem solid $primary01;
        transition: 0.4s;
    }


    .input-padrao:valid + label,
    .input-padrao:focus + label{
        top: -15px;
        left: 0px;
        color: $primary01;
    }

    .button-padrao-01{
        margin: 1rem 0rem;
        
        cursor: pointer;
        transition: 0.2s;
        border: 0px;
        width: 14rem;
        height: 3rem;
        background: linear-gradient(267deg, $primary01 0%, $primary02 100%);
        color: #fff;
        border-radius: 0.6rem;
    }

    .button-padrao-01:hover{
        background: linear-gradient(267deg, $primary03 0%, $primary02 100%);
        transition: 0.2s;
    }


    .button-padrao-02{
        background: transparent;
        color: #707070;
        border: 0px;
        cursor: pointer;
        font-size: 1.5rem;
    }

    .button-padrao-02:hover{
        color:$primary01
    }
</style>


