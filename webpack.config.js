'use strict'
const { VueLoaderPlugin } = require('vue-loader')
module.exports = {
    mode: 'development',
    entry: [
        './src/Js/app.js'
    ],
    output: {
        path: __dirname + "/public/js",
        filename: "app.js"
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                use: 'vue-loader'
            }
        ]
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.js'
        }
    },
    plugins: [
        new VueLoaderPlugin()
    ]
}