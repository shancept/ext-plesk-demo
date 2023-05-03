// Copyright 1999-{{ year }}. Plesk International GmbH. All rights reserved.

import React, { useContext } from 'react';

export const Context = React.createContext();
export const useApp = () => useContext(Context);