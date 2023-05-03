// Copyright 1999-{{ cookiecutter.year }}. Plesk International GmbH. All rights reserved.

// noinspection ES6CheckImport,ES6UnusedImports

import React, { useState, createElement, Tabs, Tab } from 'react';
import PropTypes from 'prop-types';
import AppProvider from './Provider';
import General from '../../pages/General';

const App = ({ baseUrl }) => (
    <AppProvider baseUrl={baseUrl}>
        <General/>
    </AppProvider>);

App.propTypes = {
    baseUrl: PropTypes.string.isRequired,
};

export default App;