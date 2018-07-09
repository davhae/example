<template>
    <div>
        <h1>Hello World!</h1>
        <todo></todo>
    </div>
</template>

<script>
    // import and define component so we can use it in the template
    import Todo from './Components/Todo.vue'
    export default {
        name: "App",
        components: {
            'todo': Todo
        }
    }
</script>

<style scoped>

</style>