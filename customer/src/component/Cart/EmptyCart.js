import React, {Component} from 'react';

import '../../assets/css/all.min.css';

class EmptyCart extends Component {

    render() {
        return <div className="col text-center empty-cart">
            <h3 className="col">Your Cart is Empty</h3>
            <div className="col">
                <i className="fa fa-shopping-cart"></i>
            </div>
            <div className="col description">
                Your cart is empty. Add items to cart to proceed
            </div>
        </div>
    }
}

export default EmptyCart
