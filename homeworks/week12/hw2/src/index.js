import React from 'react';
import ReactDOM from 'react-dom';
import 'bootstrap/dist/css/bootstrap.css'
import './index.css';
import Game from './App';
import * as serviceWorker from './serviceWorker';

ReactDOM.render(<Game />, document.getElementById("root"));

serviceWorker.unregister();
