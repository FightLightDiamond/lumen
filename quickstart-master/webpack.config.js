var webpack = require('webpack');
var HtmlWebpackPlugin = require('html-webpack-plugin');
module.exports = {
    entry: './app/main.ts',
    output: {
        path: './dist',
        filename: 'app.bundle.js'
    },
    module: {
        loaders: [
            {
                test: /\.ts$/, loader: 'ts'
            }
        ]
    },
    resolve: {
        extensions: [
            '', '.js', '.ts'
        ]
    },
    plugins: [
      new HtmlWebpackPlugin({
        template: './index.html'
      })
    ]
};

