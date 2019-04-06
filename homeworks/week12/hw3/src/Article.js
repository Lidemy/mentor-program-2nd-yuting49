import React, { Component } from 'react';
import axios from 'axios';
import './App.css';

class Articles extends Component {
  constructor(props) {
    super(props);
    this.state = {
      postData:[],
      pick: null
    }
  }
  
  componentDidMount() {
    axios.get('https://jsonplaceholder.typicode.com/posts')
          .then((response) => {
            this.setState({
                postData: response.data,
            });
          })
  }

  handleBack(){
    this.setState({
      pick: null
    })
  }

  render(){
    return(
      <div className="main">
        <h2>Articles</h2>
        { this.state.pick && <EachArticle id={this.state.pick} onClick={this.handleBack}/> }
        {
          !this.state.pick &&
          <ul className="list-group">
            { this.state.postData.map( (item) => 
              { return(
                <li key={item.id} className="list-group-item" onClick={()=> {
                  this.setState({
                    pick:item.id
                  })
                }}>
                  <div>No.{item.id}</div>
                  {item.title}
                </li> 
              )}
            )}
          </ul> 
        }
    </div>    
    )
  }
}
//
class EachArticle extends Component{
  constructor(props) {
    super(props);
    this.state = {
      article:[],
    }
  }
  componentDidMount() {
    axios.get('https://jsonplaceholder.typicode.com/posts/' + this.props.id)
          .then((response) => {
            this.setState({
                article: response.data,
            });
          })
  }
  
  render(){
    return (
      <div className="main">
        <button className="btn btn-outline-info" onClick={()=>this.props.onClick()}>Back to list</button>
        <div>
          <h2>Title:{this.state.article.title}</h2>
          <div>article id:{this.props.id}</div>
          <div>author:{this.state.article.userId}</div>
          <p>{this.state.article.body}</p>
        </div>
      </div>
      
    )
  }
}

export default Articles;
