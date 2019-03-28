import React from 'react';
import './App.css';

class Square extends React.Component {
  render() {
    let style = ["square"]
    if (this.props.value === 'x') { style.push("black") } 
    if (this.props.value === 'o') { style.push("white") } 
    return (
      <button className={style.join(' ')} onClick={ () => this.props.onClick() }>
        {this.props.value}
      </button>
    );
  }
}

class Board extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      squares: Array(19*19).fill(null),//對應棋盤狀態
      blackIsNext: true,
    } 
  }

  handleClick(i){
    const black = 'x'
    const white = 'o'
    const squares = this.state.squares.slice();
    if (checkWinner(squares) || squares[i]) {
      return;
    }
    squares[i] = this.state.blackIsNext ? black : white;
    this.setState({
      squares: squares,
      blackIsNext: !this.state.blackIsNext,
    })
  }//透過 slice 回傳一個長度一樣的新陣列，並給指定位置指定值，重新setState

  renderSquare(){
    const box = this.state.squares.map(
      (squares, index) =>
      <Square className="square" key={index} 
        value={this.state.squares[index]}   onClick={ () => this.handleClick(index)} 
      //pass function to Square 
      />
    );
    return box
  }

  render() {
    const black = 'BLACK'
    const white = 'WHITE'
    const winner = checkWinner(this.state.squares);
    let status
    if (winner) {
      status = 'Winner is '+ winner + ' !'
    } else {
      status = 'Next player: '+(this.state.blackIsNext ? black : white);
    }

    return (//TODO:Record & Reatart
      <div >
        <header>
          <button className="btn btn-outline-dark btn-lg" >Record</button>
          <div className="status">{status}</div>   
          <button className="btn btn-outline-dark btn-lg" >Restart</button> 
        </header>  
          {this.renderSquare()}
      </div>
    );
  }
}

class Game extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      history: [{
        squares: Array(19*19).fill(null),
      }],
      blackIsNext: true,
    };
  }
  render() {
    return (
        <div className="game">
          <h1>Gomoku</h1>
          <Board />
        </div>
    );
  }
}

function checkWinner(squares) {
  const winlines = [] //計算勝利組合
  for (let i = 0; i < 19*19; i++) {
    winlines.push([i, i+1, i+2, i+3, i+4])    //橫的
    winlines.push([i, i+19, i+38, i+57, i+76])//直的
    winlines.push([i, i+20, i+40, i+60, i+80])//斜率 1 or -1
    winlines.push([i, i+18, i+36, i+54, i+72])
  } 
  for (let i = 0; i < winlines.length; i++) {
    const [a, b, c, d, e] = winlines[i]; //核對盤面是否吻合
    if (squares[a] && squares[a]  === squares[b] && squares[a]  === squares[c] &&
        squares[a]  === squares[d] && squares[a]  === squares[e]){
        return (squares[a] === 'x' ? 'BLACK': 'WHITE')
    }
  }return null
}

export default Game;