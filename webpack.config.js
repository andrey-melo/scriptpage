const path = require('path');

module.exports = {
    plugins:[
        new webpack.ProvidePlugin({     
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            $: 'jquery',     
          }),
        ],
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
    devServer: {
        host: '0.0.0.0',
        port: 8080,
    },
};
