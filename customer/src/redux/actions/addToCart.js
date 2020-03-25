export const addToCart = item => ({
    type: 'add_to_cart',
    payload: {
        item: item
    }
});
