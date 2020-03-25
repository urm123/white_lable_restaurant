import React, {Component} from 'react';

class CartTotals extends Component {
    render() {
        return <div className="cart-totals col">
            <table className="table table-borderless">
                <tbody>
                <tr>
                    <th>Subtotal</th>
                    <td className="text-right">{this.getPrice(this.props.subtotal)}</td>
                </tr>
                <tr>
                    <th>V.A.T.</th>
                    <td className="text-right">{this.getPrice(this.props.vat)}</td>
                </tr>

                {this.props.delivery ?
                    <tr>
                        <th>Delivery</th>
                        <td className="text-right">{this.getPrice(this.props.delivery)}</td>
                    </tr> : ''
                }
                <tr className="total">
                    <th>Total</th>
                    <td className="text-right">{this.getPrice(this.props.total)}</td>
                </tr>
                </tbody>
            </table>
        </div>
    }

    getPrice(price) {
        return '€ ' + parseFloat(price).toFixed(2)
    }
}

export default CartTotals;
