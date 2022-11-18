// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

// noinspection ES6CheckImport,ES6UnusedImports

import React, { createElement } from 'react';
import { Context } from './Context';
import PropTypes from 'prop-types';

const Provider = ({
    baseUrl,
    credentials,
    children,
}) => (
    // eslint-disable-next-line react/jsx-no-constructed-context-values
    <Context.Provider value={{ baseUrl, credentials }}>
        {children}
    </Context.Provider>
);

Provider.propTypes = {
    baseUrl: PropTypes.string.isRequired,
    children: PropTypes.object.isRequired,
    credentials: PropTypes.isRequired,
};

export default Provider;
