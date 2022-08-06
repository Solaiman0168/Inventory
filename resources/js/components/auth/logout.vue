<template>

</template>


<script>
// import { Toast } from '../../../../public/backend/vendor/bootstrap/js/bootstrap.bundle'


    export default {
        created(){
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            Toast.fire({
                icon: 'success',
                title: 'Logout Successfully'
            })
            // Swal.fire({
            //     icon: 'success',
            //     title: 'Logout Successfully'
            // })
            this.$router.push({ name: '/'})
        }
    }
</script>


<style>

</style>

