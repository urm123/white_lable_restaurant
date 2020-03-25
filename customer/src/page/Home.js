import React, {Component} from 'react';
import Header from "../layout/Header";
import {Link} from "@reach/router";
import Slider from 'react-slick';
import axios from 'axios';

import "../assets/css/slick.css";
import "../assets/css/slick-theme.css";
import MenuItem from "../component/MenuItem";
import Footer from "../layout/Footer";

class Home extends Component {

    constructor(props) {
        super(props);
        this.state = {popularItems: []};
    }

    componentDidMount() {
        this.getPopularItems();
    }

    render() {

        const sliderSettings = {
            dots: false,
            arrows: false,
            infinite: true,
            speed: 10000,
            slidesToShow: 2.5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            hoverable: true,
            cssEase: 'linear'
        };

        const popularSliderSettings = {
            dots: false,
            arrows: true,
            infinite: true,
            speed: 200,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        };

        return <div>
            <Header/>
            <section className="container-fluid home-slider">
                <div className="row">
                    <div className="col">
                        <img src="images/home-slider.jpg" alt=""/>
                        <div className="hero-content text-center">
                            <div className="hero-text">
                                Bringing the taste of india to you. <br/>
                                Wherever you are.
                            </div>
                            <div className="hero-buttons">
                                <Link to="/order" className="btn order">Order Now</Link>
                                <Link to="/reservation" className="btn reservation">Make a Reservation</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section className="container-fluid  home-about">
                <div className="row">
                    <div className="col">
                        <div className="container-fluid limit-width">
                            <div className="row">
                                <div className="col home-about-wrapper">
                                    <div className="row">
                                        <div className="col-md-9 col">
                                            <h2 className="col">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam,
                                                nibh sed
                                                faucibus mollis
                                            </h2>
                                            <div className="col description">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam,
                                                nibh sed
                                                faucibus mollis, nibh ex varius quam, nec vulputate risus nisi id dui.
                                                Nunc
                                                ullamcorper erat vitae nulla aliquet laoreet. Mauris rhoncus efficitur
                                                nulla ut
                                                condimentum. In interdum sapien eget posuere porta. Duis vitae orci
                                                nulla. Proin ac
                                                ullamcorper nunc, ut dictum dui.
                                                <br/>
                                                <br/>
                                                Donec mollis nibh vel purus iaculis auctor. Aliquam vitae augue
                                                consectetur,
                                                consequat erat quis, euismod eros. Maecenas ut arcu vel diam ultrices
                                                venenatis.
                                                Mauris sit amet leo finibus, semper arcu quis, dictum felis. Praesent
                                                sit amet odio
                                                pulvinar, tincidunt urna ac, auctor ex.
                                            </div>
                                        </div>
                                        <div className="col col-md-3">
                                            <div className="col contact-block">
                                                <h3 className="col">
                                                    PHONE
                                                </h3>
                                                <div className="col">
                                                    (347) 555-1234
                                                </div>
                                            </div>
                                            <div className="col contact-block">
                                                <h3 className="col">
                                                    LOCATION
                                                </h3>
                                                <div className="col"> 74 5th Avenue
                                                    at St. Marks Place, <br/>
                                                    N2 6GH <br/>
                                                    London, UK <br/>
                                                </div>
                                            </div>
                                            <div className="col contact-block">
                                                <h3 className="col">
                                                    HOURS
                                                </h3>
                                                <div className="col">
                                                    M-Th 5p–11p <br/>
                                                    F-Sa 12p–11p <br/>
                                                    Su 10a–11p <br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section className="container-fluid home-carousel">
                <div className="row">
                    <div className="col">
                        <Slider {...sliderSettings}>
                            <div className="col">
                                <img src="images/slider-1.png" alt="" className="img-fluid"/>
                            </div>
                            <div className="col">
                                <img src="images/slider-2.png" alt="" className="img-fluid"/>
                            </div>
                            <div className="col">
                                <img src="images/slider-1.png" alt="" className="img-fluid"/>
                            </div>
                            <div className="col">
                                <img src="images/slider-2.png" alt="" className="img-fluid"/>
                            </div>
                        </Slider>
                    </div>
                </div>
            </section>
            <section className="container-fluid popular-menu-items limit-width">
                <div className="row">
                    <div className="col">
                        <h2 className="col">
                            Popular Items
                        </h2>
                        <div className="col">
                            <Slider {...popularSliderSettings}>
                                {this.showPopularItems()}
                            </Slider>
                        </div>
                    </div>
                </div>
            </section>
            <section className="container-fluid home-reservation">
                <div className="row">
                    <div className="col">
                        <div className="container-fluid limit-width">
                            <div className="row">
                                <div className="col">
                                    <h2 className="col">Make a Reservation</h2>
                                    <div className="col text-center sub-title">
                                        <button type="btn" className="btn">Book your Spot</button>
                                    </div>
                                    <div className="col text-center description">
                                        Call (347) 321–1234 from 5a – 11p daily, or book online
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <Footer/>
        </div>
    }

    getPopularItems() {
        axios.get('http://localhost/white_label_restaurant_web/public/api/web/popular-items').then(response => {
            this.setState({popularItems: response.data.data});
        }).catch(error => {
            console.log(error);
        });
    }

    showPopularItems() {
        var menuItems = [];
        this.state.popularItems.forEach((popularItem) => {
            menuItems.push(<MenuItem key={popularItem.id} name={popularItem.name} price={popularItem.price}
                                     image={popularItem.logo} id={popularItem.id}
                                     description={popularItem.description}/>);
        });
        return menuItems;
    }


}


export default Home;
