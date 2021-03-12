import React from 'react';
import "bootstrap/dist/css/bootstrap.min.css";
import './App.css';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import Login from "./components/login.component";
import SignUp from "./components/signup.component";
import App2 from "./App2";

function App() {
  return (<Router>
    <div className="container">
      <nav className="navbar navbar-expand-lg navbar-light fixed-top">
        <div className="container">
          
          <div className="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul className="navbar-nav ml-auto">
            </ul>
          </div>
        </div>
      </nav>

      <div className="outer">
        <div className="inner">
          <Switch>
            <Route exact path='/' component={Login} />
            <Route path="/sign-in" component={Login} />
            <Route path="/sign-up" component={SignUp} />
            <Route path="/app2" component={App2} />
          </Switch>
        </div>
      </div>
    </div></Router>
  );
}

export default App;