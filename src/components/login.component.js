import React, { Component } from "react";
import { BrowserRouter as Route, Link  } from "react-router-dom";
import App2 from "../App2";
export default class Login extends Component {
    render() {
        return (
            <form>

                <h3>Log in</h3>

                <div className="form-group">
                    <label>Username</label>
                    <input type="name" className="form-control" placeholder="Enter username" />
                </div>

                <div className="form-group">
                    <label>Password</label>
                    <input type="password" className="form-control" placeholder="Enter password" />
                </div>

                <div className="form-group">
                    <div className="custom-control custom-checkbox">
                        <input type="checkbox" className="custom-control-input" id="customCheck1" />
                        <label className="custom-control-label" htmlFor="customCheck1">Remember me</label>
                    </div>
                </div>

                <Link to="/app2">Login</Link>
                
                <Route path="/app2" component={App2}/>
               
            </form>
          
        );
    }
}