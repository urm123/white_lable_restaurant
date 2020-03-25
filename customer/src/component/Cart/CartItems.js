import React, {Component} from 'react';
import {store} from "../../redux/store";
import {removeFromCart} from "../../redux/actions/removeFromCart";

class CartItems extends Component {
    render() {
        return <div className="cart-items col">
            <table className="table table-borderless">
                <tbody>
                {this.getCartItems()}
                </tbody>
            </table>
        </div>
    }

    getCartItems() {
        let cart_items = [];
        store.getState().cart.forEach((cartItem, index) => {
            cart_items.push(<tr className="cart-item" key={cartItem.id + index + cartItem.quantity}>
                <td className="remove-cart-item">
                    <button className="btn" onClick={this.removeCartItem.bind(this, cartItem)}><i
                        className="fa fa-minus"></i>
                    </button>
                </td>
                <td className="description">{cartItem.name} X {cartItem.quantity}</td>
                <td className="price">{this.getPrice(cartItem.price)}</td>
            </tr>)
        });
        return cart_items;
    }

    removeCartItem(cartItem) {
        store.dispatch(removeFromCart(cartItem))
    }

    getPrice(price) {
        return '€ ' + parseFloat(price).toFixed(2)
    }
}

export default CartItems;
