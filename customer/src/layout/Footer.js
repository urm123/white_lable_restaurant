import React, {Component} from 'react';
import {Link} from "@reach/router";

import '../assets/css/all.min.css';


class Footer extends Component {
    render() {
        return <footer className="container-fluid">
            <div className="row">
                <div className="col">
                    <div className="container-fluid limit-width">
                        <div className="row">
                            <div className="col">
                                <div className="row">
                                    <div className="col">
                                        <div className="row">
                                            <div className="col">
                                                <h3 className="col">
                                                    Namaste India
                                                </h3>
                                                <ul className="col">
                                                    <li><Link to="/about-us">About Us</Link></li>
                                                    <li><Link to="/blog">Blog</Link></li>
                                                    <li><Link to="/careers">Careers</Link></li>
                                                    <li><Link to="/press">Press</Link></li>
                                                    <li><Link to="/faq">FAQ</Link></li>
                                                </ul>
                                            </div>
                                            <div className="col">
                                                <h3 className="col">
                                                    Customer Service
                                                </h3>
                                                <ul className="col">
                                                    <li><Link to="/contact-us">Contact Us</Link></li>
                                                    <li><Link to="/terms-of-service">Terms of Service</Link></li>
                                                    <li><Link to="/privacy-policy">Privacy Policy</Link></li>
                                                    <li><Link to="/delivery">Delivery</Link></li>
                                                </ul>
                                            </div>
                                            <div className="col">
                                                <h3 className="col">
                                                    More
                                                </h3>
                                                <ul className="col">
                                                    <li><Link to="/ios">Namaste India for iOS</Link></li>
                                                    <li><Link to="/android">Namaste India for Android</Link></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col text-right">
                                        <h3 className="col">
                                            Join Us On
                                        </h3>
                                        <ul className="col social-icons">
                                            <li><a href="https://www.facebook.com"><i className="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="https://www.twitter.com"><i className="fab fa-twitter"></i></a>
                                            </li>
                                            <li><a href="https://www.instagram.com"><i className="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                        <div className="col payment-icons">
                                            <ul className="col">
                                                <li><i className="fab fa-cc-visa"></i></li>
                                                <li><i className="fab fa-cc-mastercard"></i></li>
                                                <li><i className="fab fa-cc-amex"></i></li>
                                                <li><i className="fab fa-cc-paypal"></i></li>
                                                <li><i className="fab fa-ticket"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    }
}

export default Footer;
