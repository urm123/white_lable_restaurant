import React from 'react';
import {Router} from "@reach/router";
import Home from "./page/Home";

import './assets/css/bootstrap.min.css';
import './assets/css/style.css';
import Menu from "./page/Menu";

function App() {
    return (
        <div>
            <Router>
                <Home path="/"/>
                <Menu path="/menu"/>
            </Router>
        </div>
    );
}

export default App;
