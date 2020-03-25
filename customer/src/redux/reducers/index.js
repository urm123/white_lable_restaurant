export default (state, action) => {

    let cart = state.cart;

    let existing_item = [];

    switch (action.type) {
        case 'add_to_cart':
            existing_item = cart.filter((item) => {
                return item.id === action.payload.item.id
            });
            if (existing_item.length) {
                existing_item[0].quantity++;
            } else {
                cart.push(action.payload.item);
            }

            return {...state, cart: cart};
        case 'remove_from_cart':

            existing_item = cart.filter((item) => {
                return item.id === action.payload.item.id
            });

            if (existing_item.length) {
                if (existing_item[0].quantity > 1) {
                    existing_item[0].quantity--;
                } else {
                    var delete_index = 0;
                    cart.forEach((item, index) => {
                        if (item.id === existing_item[0].id) {
                            delete_index = index;
                        }
                    });
                    cart.splice(delete_index, 1);
                }
            } else {
                console.error('exception. leaked menu item.')
            }

            return {...state, cart: cart};

        case 'set_cart_type':
            let type = action.payload.type;
            return {...state, cart_type: type};
        default:
            return state;
    }

}
