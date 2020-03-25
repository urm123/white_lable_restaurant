export const removeFromCart = item => ({
    type: 'remove_from_cart',
    payload: {
        item: item
    }
});
