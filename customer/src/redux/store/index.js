import {createStore} from "redux";
import reducer from "../reducers";


const initialState = {
    cart: [],
    authenticated: false,
    cart_type: 'delivery',
    login: true,
    registration: false
};
export const store = createStore(reducer, initialState);
