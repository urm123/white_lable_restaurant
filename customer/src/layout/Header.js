import React, {Component} from 'react';
import {Link} from "@reach/router";
import Authentication from "../component/Authentication/Authentication";

class Header extends Component {

    constructor(props) {
        super(props);
        this.state = {
            showLogin: false,
            loginAction: false,
            loginActionString: 'login_false',
            showRegister: false,
            registerAction: false,
            registerActionString: 'register_false',
        }
    }

    render() {
        return <header className="container-fluid">
            <Authentication key={this.state.loginActionString + "_" + this.state.registerActionString}
                            showLogin={this.state.showLogin} loginAction={this.state.loginActionString}
                            showRegister={this.state.showRegister} registerAction={this.state.registerActionString}/>
            <div className="row">
                <div className="col">
                    <div className="container-fluid limit-width">
                        <div className="row">
                            <div className="col">
                                <nav className="navbar navbar-expand-lg navbar-light">
                                    <Link to="/" className="navbar-brand">Namaste <span>India</span></Link>
                                    <button className="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                        <span className="navbar-toggler-icon"></span>
                                    </button>

                                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul className="navbar-nav ml-auto">

                                            <li className="nav-item">
                                                <Link className="nav-link" to="/menu">Menu</Link>
                                            </li>
                                            <li className="nav-item">
                                                <Link className="nav-link" to="/reviews">Reviews</Link>
                                            </li>
                                            <li className="nav-item">
                                                <Link className="nav-link about" to="/about">About</Link>
                                            </li>
                                            <li className="nav-item sign-up">
                                                <button className="btn" onClick={this.showRegister.bind(this)}>Sign Up
                                                </button>
                                            </li>
                                            <li className="nav-item sign-in">
                                                <button className="btn" onClick={this.showLogin.bind(this)}>Sign In
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    }

    showLogin() {
        this.setState({showLogin: true});
        this.setState({loginAction: !this.state.loginAction});
        this.setState({loginActionString: 'login_' + this.state.loginAction});
    }

    showRegister() {
        this.setState({showRegister: true});
        this.setState({registerAction: !this.state.registerAction});
        this.setState({registerActionString: 'register_' + this.state.registerAction});
    }


}

export default Header;
