import React, {Component} from 'react';
import Header from "../layout/Header";
import Footer from "../layout/Footer";
import PageHeader from "../component/Page/PageHeader";
import axios from "axios";
import MenuItem from "../component/MenuItem";
import Cart from "../component/Cart/Cart";

class Menu extends Component {

    constructor(props) {
        super(props);
        this.state = {items: [], categories: []};
    }

    componentDidMount() {
        this.getPopularItems();
        this.getCategories()
    }


    render() {


        return <div>
            <Header/>
            <PageHeader heading="Our Menu" image="images/menu-header.png"/>
            <section className="container-fluid limit-width menu">
                <div className="row">
                    <div className="col">
                        <div className="row">
                            <div className="col col-sm-8">
                                <div className="col menu-categories">
                                    <ul>
                                        {this.showCategories()}
                                    </ul>
                                </div>
                                <div className="col">
                                    {this.showItems()}
                                </div>
                            </div>
                            <div className="col col-sm-4">
                                <Cart/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <Footer/>
        </div>
    }

    getPopularItems() {
        axios.get('http://localhost/white_label_restaurant_web/public/api/web/menu-items?menu_id=0').then(response => {
            this.setState({items: response.data.data});
        }).catch(error => {
            console.log(error);
        });
    }

    showItems() {
        var menuItems = [];
        this.state.items.forEach((item) => {
            menuItems.push(<MenuItem className="col-sm-4" key={item.id} name={item.name} id={item.id}
                                     price={item.price}
                                     image={item.logo}
                                     description={item.description}/>);
        });
        return menuItems;
    }

    showCategories() {
        var categories = [];
        this.state.categories.forEach((category) => {
            categories.push(<li key={category.id}>
                <button value={category.id} className={category.selected ? "btn selected" : "btn"}
                        onClick={this.setCategory.bind(this)}>{category.name}</button>
            </li>);
        });
        return categories;
    }

    getCategories() {
        axios.get('http://localhost/white_label_restaurant_web/public/api/web/menu-categories').then(response => {
            this.setState({categories: response.data.data});
        }).catch(error => {
            console.log(error);
        });
    }

    setCategory(event) {
        let category_id = parseInt(event.target.value);
        let categories = this.state.categories;
        categories.forEach((category) => {
            if (category.id === category_id) {
                category.selected = true;
            } else {
                category.selected = false;
            }
        });

        axios.get('http://localhost/white_label_restaurant_web/public/api/web/menu-items?menu_id=' + category_id).then(response => {
            this.setState({items: response.data.data});
            this.setState({categories: categories});
        }).catch(error => {
            console.log(error);
        });
    }
}


export default Menu;
