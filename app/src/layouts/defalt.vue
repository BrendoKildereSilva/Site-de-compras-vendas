<template>
    <div>
        <router-view></router-view>
    </div>
</template>



<style lang="scss">
// Classes Padõp
    .input-padrao{
        outline: none;
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

        .input-padrao:focus + label{
        color: $primary01;
    }
</style>


