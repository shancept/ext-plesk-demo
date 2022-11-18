// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

import React, { useState, useEffect, createElement } from 'react';
import {
    Form,
    FormFieldText,
    Translate,
    FormFieldPassword,
} from '@plesk/ui-library';
import { useApp } from '../App/Context';
import { useToaster } from '../Toaster/Context';

const CredentialsForm = () => {
    const [formSubmitting, setFormSubmitting] = useState(false);
    const [changed, setChanged] = useState(false);
    const { success, danger } = useToaster();
    const { credentials, baseUrl } = useApp();
    const [form, setForm] = useState({
        apiKey: '',
        keyTitle: credentials.keyTitle,
    });
    const [formDefault, setFormDefault] = useState(form);

    useEffect(() => {
        const jsonForm = JSON.stringify(form);
        const jsonFormDefault = JSON.stringify(formDefault);
        setChanged(jsonForm !== jsonFormDefault);
    }, [form, formDefault]);

    const handleSubmit = async state => {
        setFormSubmitting(true);
        const response = await fetch(`${baseUrl}/api/credentials`, {
            method: 'PUT',
            body: JSON.stringify(state),
        });
        setFormSubmitting(false);
        if (response.status === 202) {
            setFormDefault(state);
            setChanged(false);
            success(<Translate content="credentials.successSave" />);
        } else if (response.status === 422) {
            const jsonErrorResponse = await response.json();
            for (const key in jsonErrorResponse.errors) {
                const message = jsonErrorResponse.errors[key];
                danger(message);
            }
        } else {
            danger(<Translate content="credentials.errorSave" />);
        }
    };
    const handleCancel = () => {};
    return (
        <Form
            onSubmit={handleSubmit}
            values={form}
            applyButton={false}
            submitButton={{
                children: formSubmitting ? 'Saving...' : 'Save',
                disabled: formSubmitting || !changed,
            }}
            cancelButton={{
                onClick: handleCancel,
            }}
        >
            <FormFieldPassword
                name="apiKey" label="Api token" hideGenerateButton
                hidePasswordMeter required
                onChange={value => {
                    setForm({ ...form, apiKey: value });
                }}
            />
            <FormFieldText
                name="keyTitle" label="Api title" required
                onChange={value => {
                    setForm({...form,  keyTitle: value });
                }}
            />
        </Form>
    );
};

export default CredentialsForm;