// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

// noinspection ES6CheckImport,ES6UnusedImports
import React, { createElement, useRef } from 'react';
import { Context } from './Context';
import PropTypes from 'prop-types';
import { Toaster } from '@plesk/plesk-ext-sdk';

const Provider = ({ children }) => {
    const INDENT_SUCCESS = 'success';
    const INDENT_DANGER = 'danger';

    const toasterRef = useRef();

    const success = message => {
        toasterRef.current.add({ intent: INDENT_SUCCESS, message });
    };

    const danger = message => {
        toasterRef.current.add({ intent: INDENT_DANGER, message });
    };

    return (
        // eslint-disable-next-line react/jsx-no-constructed-context-values
        <Context.Provider value={{ success, danger }}>
            <Toaster ref={toasterRef} />
            {children}
        </Context.Provider>
    );
};

Provider.propTypes = {
    children: PropTypes.object.isRequired,
};

export default Provider;
