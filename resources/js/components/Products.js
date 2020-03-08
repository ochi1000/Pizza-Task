    import axios from 'axios'
    import React, { Component } from 'react'
    import { Link } from 'react-router-dom'
    import 'font-awesome/css/font-awesome.min.css';


    class Products extends Component {
      constructor () {
        super()
        this.state = {
          products: []
        }
        // add to cart
        this.handleAddToCart = this.handleAddToCart.bind(this);
      }

      componentDidMount () {
        axios.get('/api/products').then(response => {
          this.setState({
            products: response.data,
          })
        })

      }

      render () {
        const { products } = this.state
        return (
          <div className='container '>
            <div className='row'>
            {products.map((product,index)=> (
              <div className='col-6' key={index}>
                <div className='card'>
                  <div className='card-header'>All Products</div>

                        <div className='card-body'>

                          {product.name} {product.size} size

                        <button
                        className='btn btn-success align-items-center'
                        value={product.id}
                        onClick={this.handleAddToCart}
                        >
                            <span className="fa fa-shopping-cart pr-2"></span>
                             add to cart
                        </button>
                        </div>


                </div>
              </div>
               ))}
            </div>
            <br/>
                <div className="d-flex justify-content-center">
            <Link
                className='btn btn-success'
                to='/cart'
                >Make Order</Link>
                </div>
        </div>
        )
      }

      handleAddToCart(e){

        e.preventDefault()
        const productId = e.target.value
        axios.post(`/api/products/${productId}`)
        .then(response => {
            console.log(response.data)
          })
          .catch(error => {
            console.log(error.message);

          })

        }
    }

    export default Products
