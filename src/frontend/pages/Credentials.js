// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

import React, { createElement } from 'react';
import { PageHeader, Translate } from '@plesk/plesk-ext-sdk';
import Form from '../components/Credentials/Form';

const Credentials = () => (
    <>
        <PageHeader title={<Translate content="credentials.title" />} />
        <Form />
    </>
);

export default Credentials;