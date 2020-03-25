import React, {Component} from 'react';

import '../assets/css/all.min.css'
import {store} from "../redux/store";
import {addToCart} from "../redux/actions/addToCart";

class MenuItem extends Component {
    render() {
        return <div className={"col menu-item " + this.props.className}>
            <div className="col image">
                <img src={this.props.image} alt={this.props.name} className="img-fluid"/>
                <button className="btn">
                    <i className="fas fa-heart"></i>
                </button>
            </div>
            <h3 className="col">
                {this.props.name}
            </h3>
            <div className="col description">
                {this.props.description}
            </div>
            <div className="col details">
                <span>{this.getPrice(this.props.price)}</span>
                <button className="btn float-right" type="button" onClick={this.addToCart.bind(this)}
                        value={this.props.id}>+
                </button>
            </div>
        </div>;
    }

    addToCart() {
        store.dispatch(addToCart({
            id: this.props.id,
            name: this.props.name,
            image: this.props.image,
            price: this.props.price,
            description: this.props.description,
            quantity: 1,
        }));
    }


    getPrice(price) {
        return '€ ' + parseFloat(price).toFixed(2)
    }
}

export default MenuItem;
