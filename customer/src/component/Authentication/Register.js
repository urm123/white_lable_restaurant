import React, {Component} from 'react';
import axios from 'axios';

class Register extends Component {

    constructor(props) {
        super(props);

        this.state = {
            showRegister: this.props.showRegister,
            validation: {},
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            confirm_password: ''
        }
    }

    render() {
        return <div>
            <div
                className={(this.state.showRegister) ? 'modal fade show login' : 'modal fade login'}
                style={(this.state.showRegister) ? {display: 'block'} : {}} tabIndex="-1"
                role="dialog">
                <div className="modal-dialog" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title m-auto">Sign Up</h5>
                            {!this.props.protectedRoute &&
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close"
                                    onClick={this.closeModal.bind(this)}>
                                <span aria-hidden="true">&times;</span>
                            </button>
                            }
                        </div>
                        <div className="modal-body">
                            <form onSubmit={this.submitRegister.bind(this)}>
                                <div
                                    className={this.state.validation.first_name ? 'form-group has-error' : 'form-group'}>
                                    <label htmlFor="first_name">First Name<span>*</span></label>
                                    <input type="text" className="form-control" id="first_name"
                                           placeholder="Enter first name" onKeyUp={this.setFirstName.bind(this)}/>
                                    {this.state.validation.first_name &&
                                    <span className="help-block">{this.state.validation.first_name}</span>}
                                </div>
                                <div
                                    className={this.state.validation.last_name ? 'form-group has-error' : 'form-group'}>
                                    <label htmlFor="last_name">Last Name<span>*</span></label>
                                    <input type="text" className="form-control" id="last_name"
                                           placeholder="Enter last name" onKeyUp={this.setLastName.bind(this)}/>
                                    {this.state.validation.last_name &&
                                    <span className="help-block">{this.state.validation.last_name}</span>}
                                </div>
                                <div className={this.state.validation.email ? 'form-group has-error' : 'form-group'}>
                                    <label htmlFor="email">Email<span>*</span></label>
                                    <input type="email" className="form-control" id="email"
                                           placeholder="Enter email" onKeyUp={this.setEmail.bind(this)}/>
                                    {this.state.validation.email &&
                                    <span className="help-block">{this.state.validation.email}</span>}
                                </div>
                                <div className={this.state.validation.password ? 'form-group has-error' : 'form-group'}>
                                    <label htmlFor="password">Password<span>*</span></label>
                                    <input type="password" className="form-control" id="password"
                                           placeholder="Enter password" onKeyUp={this.setPassword.bind(this)}/>
                                    {this.state.validation.password &&
                                    <span className="help-block">{this.state.validation.password}</span>}
                                </div>
                                <div
                                    className={this.state.validation.confirm_password ? 'form-group has-error' : 'form-group'}>
                                    <label htmlFor="confirm_password">Confirm Password<span>*</span></label>
                                    <input type="password" className="form-control" id="confirm_password"
                                           placeholder="Enter confirm password"
                                           onKeyUp={this.setConfirmPassword.bind(this)}/>
                                    {this.state.validation.confirm_password &&
                                    <span className="help-block">{this.state.validation.confirm_password}</span>}
                                </div>
                                <button type="submit" className="btn">Create Account</button>
                            </form>
                            <div className="sign-up">
                                Already have an account? <button type="button" className="btn">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {(this.state.showRegister) ? <div className="modal-backdrop fade show"></div> : ''}
        </div>
    }

    closeModal() {
        this.setState({showRegister: false});
    }

    submitRegister(e) {
        e.preventDefault();

        axios.post('http://localhost/white_label_restaurant_web/public/api/web/register', {
            grant_type: 'password',
            client_id: 1,
            client_secret: 'oNfsDxFcEYTlt10EzIR4FbtWEOAKFevNK1dnosAJ',
            username: this.state.email,
            password: this.state.password,
            scope: '*',
        }).then(response => {
            localStorage.setItem('sessionToken', response.data.access_token);
            this.setState({showModal: false, showRegister: false})
        }).catch(error => {
            if (error.response.status === 400) {
                this.setState({validation: {email: 'Please enter an valid email address!'}})
            }
        });
    }

    setFirstName(event) {
        this.setState({first_name: event.target.value});
    }

    setLastName(event) {
        this.setState({last_name: event.target.value});
    }

    setEmail(event) {
        this.setState({email: event.target.value});
    }

    setPassword(event) {
        this.setState({password: event.target.value});
    }

    setConfirmPassword(event) {
        this.setState({confirm_password: event.target.value});
    }
}

export default Register;
