import React, {Component} from 'react';
import axios from 'axios';

class Login extends Component {

    constructor(props) {
        super(props);

        this.state = {
            showLogin: this.props.showLogin,
            validation: {},
            email: '',
            password: ''
        }
    }

    render() {
        return <div>
            <div
                className={(this.state.showLogin) ? 'modal fade show login' : 'modal fade login'}
                style={(this.state.showLogin) ? {display: 'block'} : {}} tabIndex="-1"
                role="dialog">
                <div className="modal-dialog" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title m-auto">Sign In</h5>
                            {!this.props.protectedRoute &&
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close"
                                    onClick={this.closeModal.bind(this)}>
                                <span aria-hidden="true">&times;</span>
                            </button>
                            }
                        </div>
                        <div className="modal-body">
                            <form onSubmit={this.submitLogin.bind(this)}>
                                <div className={this.state.validation.email ? 'form-group has-error' : 'form-group'}>
                                    <label htmlFor="email">Email<span>*</span></label>
                                    <input type="email" className="form-control" id="email"
                                           placeholder="Enter email" onKeyUp={this.setEmail.bind(this)}/>
                                    {this.state.validation.email &&
                                    <span className="help-block">{this.state.validation.email}</span>}
                                </div>
                                <div className="form-group">
                                    <label htmlFor="password">Password<span>*</span></label>
                                    <input type="password" className="form-control" id="password"
                                           placeholder="Password" onKeyUp={this.setPassword.bind(this)}/>
                                    <span className="forgot-password"><button className="btn">Forgot Password?</button></span>
                                </div>
                                <button type="submit" className="btshowLoginn">Sign In</button>
                            </form>
                            <div className="sign-up">
                                Don't have an account? <button type="button" className="btn">Join Us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {(this.state.showLogin) ? <div className="modal-backdrop fade show"></div> : ''}
        </div>
    }

    closeModal() {
        this.setState({showLogin: false});
    }

    submitLogin(e) {
        e.preventDefault();

        axios.post('http://localhost/white_label_restaurant_web/public/oauth/token', {
            grant_type: 'password',
            client_id: 1,
            client_secret: 'oNfsDxFcEYTlt10EzIR4FbtWEOAKFevNK1dnosAJ',
            username: this.state.email,
            password: this.state.password,
            scope: '*',
        }).then(response => {
            localStorage.setItem('sessionToken', response.data.access_token);
            this.setState({showModal: false, showLogin: false})
        }).catch(error => {
            console.log(error.response.data);
            if (error.response.status === 400) {
                this.setState({validation: {email: 'Please enter an valid email address!'}})
            }
        });
    }

    setEmail(event) {
        this.setState({email: event.target.value});
    }

    setPassword(event) {
        this.setState({password: event.target.value});
    }


}

export default Login;
