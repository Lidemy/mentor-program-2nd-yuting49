import React, { Component } from 'react';

class Todo extends Component {
  constructor(props){
    super(props)
    this.state = {
      itemclass:'bgn list-group-item d-flex justify-content-between',
      isCompleted: false
    }
    this.delete = this.delete.bind(this)
    this.mark = this.mark.bind(this)
  }

  delete(){
    const {todo, deleteTodo} = this.props
    deleteTodo(todo.id)
  }
  //可以直接新增/變更單一個 class 嗎?
  mark(){
    if(!this.state.isCompleted){
      this.setState({
        itemclass:'bgg list-group-item d-flex justify-content-between',
        isCompleted: true
      })
    }else{
      this.setState({
        itemclass:'bgn list-group-item d-flex justify-content-between',
        isCompleted: false
      })
    }
    
  }

  render() {
    const {todo} = this.props
    return (
      <li  className={this.state.itemclass}>
        {todo.text} 
        <div>
          <button type='button' className="btn btn-success" onClick={this.mark}>完成</button>
          <button type='button' className='btn btn-danger' onClick={this.delete}>刪除</button>
        </div>
      </li>
    );
  }
}

export default Todo;