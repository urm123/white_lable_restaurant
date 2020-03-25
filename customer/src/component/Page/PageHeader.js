import React, {Component} from 'react';


class PageHeader extends Component {

    render() {


        return <section className="container-fluid page-header"
                        style={{backgroundImage: 'url(' + this.props.image + ')'}}>
            <div className="row">
                <div className="col">
                    <h1>{this.props.heading}</h1>
                </div>
            </div>
        </section>
    }


}


export default PageHeader;
