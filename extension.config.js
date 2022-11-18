// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

const path = require('path');
module.exports = {
    webpack: (config, { isDev }) => {
        if (isDev) {
            config.optimization = {
                minimize: false,
            };
        } else {
            config.devtool = undefined;
        }

        config.output.filename = 'app.js';
        config.plugins = config.plugins.filter(p => p.constructor.name !== 'HtmlWebpackPlugin');
        config.resolve.alias = {
            react: path.resolve(__dirname, './src/frontend/react-compat.js'),
            'react-dom': path.resolve(__dirname, './src/frontend/react-compat.js'),
        };

        return { ...config };
    },
};
