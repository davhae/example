<template>
    <div class="container">
        <ul id="todo">
            <li>Unit Tests</li>
            <li>Create a command-ui with vue fe and php BE executing terminal commands</li>
            <li>Cron provider // REST for creating crons like this site cron-job.org/</li>
        </ul>

        <button v-on="taskcreate">ksldf</button>
    </div>
</template>

<script>
    export default {
        name: "Todo",
        data: function() {
            return {
                tasks: ['yeee'],
                taskcreate: ''
            }
        },
        mounted() {

        },
        events: {
            'taskcreate': function (title) {
                this.tasks.push({
                    title: title
                })
            }
        }
    }
</script>

<style scoped>

</style>