import React, {Component} from 'react';
import {store} from "../../redux/store";
import {setCartType} from "../../redux/actions/setCartType";
import EmptyCart from "./EmptyCart";
import CartItems from "./CartItems";
import CartTotals from "./CartTotals";
import DatePicker from "react-date-picker";
import TimePicker from "react-time-picker";

class Cart extends Component {

    constructor(props) {
        super(props);
        this.state = {date: '', time: ''}
    }

    render() {
        return <div className="cart">
            <div className="col section-block">
                <h2 className="col"><label htmlFor="delivery-check">Delivery</label>
                    <input id="delivery-check" type="checkbox"
                           onChange={(event => {
                               this.setType(event, 'delivery')
                           })}
                           checked={store.getState().cart_type === 'delivery'}/>
                </h2>
                {store.getState().cart_type === 'delivery' && <div className="col">
                    {this.countItems() ? <div className="col">
                        <CartItems cartItems={store.getState().cart}/>
                        <CartTotals subtotal={this.getSubTotal()} vat={this.getVAT()} delivery={this.getDelivery()}
                                    total={this.getTotal()}/>
                        <div className="col special-requests">
                            <div className="col">Enter any special requests</div>
                            <div className="col">
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div className="col allergy">
                            <h3>Allergy Information</h3>
                            <div className="col">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lobortis, ante at pretium
                                egestas, odio leo vehicula ante, sed porttitor turpis libero eu risus. Sed sit amet
                                gravida nulla. Pellentesque turpis sapien, finibus id diam id, iaculis ullamcorper
                                lectus. Aenean hendrerit odio eu sapien dapibus tincidunt.
                            </div>
                        </div>
                        <div className="col checkout">
                            <button className="btn" onClick={this.validateDelivery()}>Proceed to Checkout</button>
                        </div>
                    </div> : <EmptyCart/>}
                </div>}
            </div>
            <div className="col section-block">
                <h2 className="col"><label htmlFor="takeaway-check">Takeaway</label>
                    <input id="takeaway-check" type="checkbox"
                           onChange={(event => {
                               this.setType(event, 'takeaway')
                           })}
                           checked={store.getState().cart_type === 'takeaway'}/>
                </h2>
                {store.getState().cart_type === 'takeaway' &&
                <div className="col">
                    {this.countItems() ? <div className="col">
                        <CartItems cartItems={store.getState().cart}/>
                        <CartTotals subtotal={this.getSubTotal()} vat={this.getVAT()} delivery={this.getDelivery()}
                                    total={this.getTotal()}/>
                        <div className="col special-requests">
                            <div className="col">Enter any special requests</div>
                            <div className="col">
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div className="col allergy">
                            <h3>Allergy Information</h3>
                            <div className="col">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lobortis, ante at pretium
                                egestas, odio leo vehicula ante, sed porttitor turpis libero eu risus. Sed sit amet
                                gravida nulla. Pellentesque turpis sapien, finibus id diam id, iaculis ullamcorper
                                lectus. Aenean hendrerit odio eu sapien dapibus tincidunt.
                            </div>
                        </div>
                        <div className="col checkout">
                            <button className="btn" onClick={this.validateTakeaway()}>Proceed to Checkout</button>
                        </div>
                    </div> : <EmptyCart/>}
                </div>}
            </div>
            <div className="col section-block">
                <h2 className="col"><label htmlFor="reservation-check">Reservation</label>
                    <input id="reservation-check" type="checkbox"
                           onChange={(event => {
                               this.setType(event, 'reservation')
                           })}
                           checked={store.getState().cart_type === 'reservation'}/>
                </h2>
                {store.getState().cart_type === 'reservation' &&
                <div className="col">
                    <div className="col">
                        <input type="number"/>
                    </div>
                    <div className="col">
                        <DatePicker onChange={this.setDate} value={this.state.date}/>
                    </div>
                    <div className="col">
                        <TimePicker onChange={this.setTime} value={this.state.time}/>
                    </div>
                </div>}
            </div>
        </div>

    }

    countItems() {
        return store.getState().cart.length;
    }

    setType(event, type) {
        if (event.target.checked) {
            store.dispatch(setCartType(type));
        }
    }

    getSubTotal() {
        let subtotal = 0;
        store.getState().cart.forEach(item => {
            subtotal += item.quantity * item.price;
        });
        return subtotal.toFixed(2);
    }

    getVAT() {
        return parseFloat(this.getSubTotal() * 0.05).toFixed(2);
    }

    getDelivery() {
        return 0.00;
    }

    getTotal() {
        return (parseFloat(this.getSubTotal()) + parseFloat(this.getDelivery()) + parseFloat(this.getVAT())).toFixed(2);
    }

    validateDelivery() {
    }

    validateTakeaway() {
    }

    setDate = date => {
        this.setState({date: date});
    };

    setTime = time => {
        this.setState({time: time});
    }
}

export default Cart;
