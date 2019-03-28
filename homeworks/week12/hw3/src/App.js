import React, { Component } from 'react';
import './App.css';
import About from './About.js'
import Articles from './Article.js'

class App extends Component {
  constructor(props) {
    super(props)
    this.state = {
      tab: false
    }
    this.handleTabChange = this.handleTabChange.bind(this)
  }

  handleTabChange(e){
    e.preventDefault()
    this.setState({
      tab: e.target.name
    })
  }
  render() {
    return (
      <div className="App">
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
          <span className="navbar-brand" >Blog</span>
          <div>
            <ul className="navbar-nav">
              <li className={"nav-item"+ (this.state.tab === 'articles' ? 'active':'')}>
                <a className="nav-link" name="articles" 
                    onClick={this.handleTabChange} href="./index.html">Articles</a>
              </li>
              <li className={"nav-item"+ (this.state.tab === 'about' ? 'active':'')}>
                <a className="nav-link" name="about"
                    onClick={this.handleTabChange} href="./index.html">About</a>
              </li>
            </ul>
          </div>
        </nav>
        <main className="container">
          {this.state.tab === 'articles' && <Articles />}
          {this.state.tab === 'about' && <About />}
        </main>
      </div>
    );
  }
}

export default App;
