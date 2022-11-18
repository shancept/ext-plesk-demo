// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

// noinspection ES6CheckImport,ES6UnusedImports

import React, { useState, createElement } from 'react';
import PropTypes from 'prop-types';
import AppProvider from './Provider';
import Credentials from '../../pages/Credentials';
import ToasterProvider from '../Toaster/Provider';

const App = ({ baseUrl, credentials }) => {
    return (
        <AppProvider
            baseUrl={baseUrl}
            credentials={credentials}
        >
            <ToasterProvider>
                <Credentials />
            </ToasterProvider>
        </AppProvider>);
};

App.propTypes = {
    baseUrl: PropTypes.string.isRequired,
    credentials: PropTypes.object.isRequired,
};

export default App;
