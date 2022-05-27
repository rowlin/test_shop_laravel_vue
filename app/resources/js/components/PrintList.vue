<template>
<div>
    {{ name }}:
    <span v-for="(el, index) in data" :key="index">
        {{ el.name }}<span v-if="index < data.length-1">, </span>
    </span>
</div>
</template>

<script>
export default {
    props:['data' , 'name'],
    name: "PrintList"
}
</script>

<style scoped>

</style>
