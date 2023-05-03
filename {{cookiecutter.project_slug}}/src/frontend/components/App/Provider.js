// Copyright 1999-{{ cookiecutter.year }}. Plesk International GmbH. All rights reserved.

// noinspection ES6CheckImport,ES6UnusedImports

import React, {createElement} from 'react';
import {Context} from './Context';
import PropTypes from 'prop-types';

const Provider = (
    {
        baseUrl,
        children,
    }
) => (
    // eslint-disable-next-line react/jsx-no-constructed-context-values
    <Context.Provider value={% raw %}{{baseUrl}}{% endraw %}>
        {children}
    </Context.Provider>
);

Provider.propTypes = {
    baseUrl: PropTypes.string.isRequired,
    children: PropTypes.object.isRequired
};

export default Provider;