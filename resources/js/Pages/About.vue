<template>
    <Head :title=" title "/>

    <h1> {{ title }} </h1>
</template>

<script>
import {Head} from '@inertiajs/vue3'
export default {
    components:{
        Head
    },
    props: {
        title: String
    },
}
</script>
