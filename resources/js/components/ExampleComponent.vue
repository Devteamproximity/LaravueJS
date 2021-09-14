<template>
<div class="">

    <router-view></router-view>
</div>

</template>

<script>
    export default {
        data()
        {
           return {
            IsloggedIn:false,
            pageLogin:true,

           }
        },
        mounted() {

        },created()
        {
 console.log('est ce la page de login ')
        }
    }
</script>
