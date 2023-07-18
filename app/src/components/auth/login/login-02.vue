<template>
    <div class="container-main">
        <p>
            Esse conta pertence a você?123
        </p>
        <p>
            {{ PropsEmail}}
        </p>

        <img :src="PropsUrlFotoPerfilUser">

        <div class="container-senha">
            <input type="password" id="input-senha">
            <label for="input-senha">senha</label>
        </div>

        <div class="container-button">
            <button>Entrar</button>
        </div>
    </div>
</template>


<script>
export default {
    props:{
        PropsEmail: String,
        PropsUrlFotoPerfilUser: String
    }
}
</script>