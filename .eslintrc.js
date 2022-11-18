// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

module.exports = {
    extends: [
        '@plesk/eslint-config',
        'eslint:recommended',
    ],
    parser: '@babel/eslint-parser',
    parserOptions: {
        babelOptions: {
            presets: [
                '@babel/preset-react',
            ],
        },
    },
    rules: {
        // suppress errors for missing 'import React' in files
        'react/react-in-jsx-scope': 'off',
        // allow jsx syntax in js files (for next.js project)
        'react/jsx-filename-extension': [1, { extensions: ['.js', '.jsx'] }], // should add ".ts" if typescript project
        'react/no-unstable-nested-components': 'off',
        'react/display-name': 'off',
        'react/no-array-index-key': 'off',
        'no-unused-vars': 'off',
        'react/jsx-closing-tag-location': 'off',
        'react/jsx-closing-bracket-location': 'off',
    },
};
