<template>
    <div class="container-main">

        <div class="container-add-foto">
            <label>Adicione uma foto de capa para seu produto</label>

            <div class="add-foto">
            </div>

            <input type="file" ref="input-file" id="input-file">
            <label for="input-file" class="button-padrao-01">Adicionar foto</label>
        </div>

        <div class="container-button">
            <button class="button-padrao-02">Voltar</button>
            <button class="button-padrao-01">Proxima etapa</button>
        </div>


    </div>
</template>


<style lang="scss" scoped>
    .container-main{
        width: 100%;
    }

    .container-add-foto{
        width: 100%;
        text-align: center;
        color: $primary01;
        display: flex;
        flex-direction: column;
        align-items: center;

        label{
            margin-bottom: 1rem;
            font-size: 1.4rem;
        }

        .add-foto{
            height: 25rem;
            width: 25rem;
            border: 0.2rem dashed $primary01;
            margin: 0 auto;
        }

        input[type=file]{
            display: none;
        }

        .button-padrao-01{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
    }

    .container-button{
        padding: 2rem;
        width: 90%;
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
    }



    

</style>

