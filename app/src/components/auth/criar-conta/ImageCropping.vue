<template>
    <div>
        <img :src="src" alt="">
    </div>
</template>


<script>
export default {
    props:{
        src: String
    }
}
</script>