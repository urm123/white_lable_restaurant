import React, {Component} from 'react';
import Login from "./Login";
import Register from "./Register";

class Authentication extends Component {

    constructor(props) {
        super(props);
        this.state = {
            showLogin: this.props.showLogin,
            showRegister: this.props.showRegister,
        };
    }

    render() {
        return <div>
            {this.getBearerToken() ? '' :
                <div>
                    <Login key={this.props.loginAction} protectedRoute={false} showLogin={this.state.showLogin}/>
                    <Register key={this.props.registerAction} protectedRoute={false}
                              showRegister={this.state.showRegister}/>
                </div>
            }
        </div>
    }

    getBearerToken() {
        return localStorage.getItem('sessionToken');
    }
}

export default Authentication;
