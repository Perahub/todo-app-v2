import React, { Component } from 'react';
import "./App.css";
import axios from 'axios';
import AddTodo from './AddTodo';
import Todo from './Todo';



class App2 extends Component{
  state= {
      todos:[]
    } ;

  componentDidMount() {
    axios
      .get('https://jsonplaceholder.typicode.com/todos?_limit=5')
      .then(res => this.setState({ todos: res.data }));
  }

  //Toggle Complete
  markComplete = id => {
    this.setState({
      todos: this.state.todos.map(todo => {
        if (todo.id === id) {
          todo.completed = !todo.completed;
        }
        return todo;
      })
    });
  };

  //Delete Todo
  delTodo = id => {
    axios.delete(`https://jsonplaceholder.typicode.com/todos/${id}`).then(res =>
      this.setState({
        todos: [...this.state.todos.filter(todo => todo.id !== id)]
      })
    );
  };

  //Add Todo
  addTodo = title => {
    axios
      .post('https://jsonplaceholder.typicode.com/todos', {
        title,
        completed: false
      })
      .then(res => this.setState({ todos: [...this.state.todos, res.data] }));
  };

  render(){
    return(
        <div className="container">
            <div>
              <header style={headerStyle}>
                <h1>TodoList</h1>
              </header>
              <AddTodo addTodo={this.addTodo} />
            
              <Todo
                    todos={this.state.todos}
                    markComplete={this.markComplete}
                    delTodo={this.delTodo}
              />
             
            </div>
        
        </div>
    );
  }
}

const headerStyle = {
  background: 'SlateBlue',
  color: 'White',
  textAlign: 'center',
};


export default App2;
