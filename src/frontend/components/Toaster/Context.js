// Copyright 1999-2022. Plesk International GmbH. All rights reserved.

import React, { useContext } from 'react';

export const Context = React.createContext();

export const useToaster = () => useContext(Context);
