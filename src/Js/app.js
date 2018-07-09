import Vue from 'vue'
import App from './App.vue'

/*const routes = [
    {
        path: '/',
        components: {
            Todo: Todo
        }
    },
    { path: '/hmmm..', component: Todo, name: 'createTodo'}
];*/

// const router = new VueRouter({ routes });

Vue.component('button-counter', {
    data: function() {
        return {
            count: 0
        }
    },
    template:
        '<button v-on:click="count++">You clicked me {{ count }} times</button>'
})


new Vue({
    el: '#app',
    render: h => h(App)
})