<template lang="pug">
.wrapper
  h1 Create a Todo
  .todo-create-container
    textarea(v-model="newTodoText")
    button(v-on:click="createTodo") Create
  hr
  h1 Your Todos
  p.error(v-if="error") {{ error }}
  .todos-container
    .todo(
      v-for="todo, index in todos"
      v-bind:item="todo"
      v-bind:index="index"
      v-bind:key="todo.id"
      v-bind:completed="todo.completed"
      v-on:click="setActiveTextArea(todo)"
    )
      input(
        type="checkbox"
        v-bind:checked="todo.completed"
        v-bind:disabled="todo.id != activeTextArea.id"
        v-model="todo.completed"
      )
      textarea(
        v-bind:readonly="todo.id != activeTextArea.id"
        v-model="todo.title"
      ) {{ todo.title }}
      .options-container(v-if="activeTextArea.id == todo.id")
        button View
        button(v-on:click="editTodo(todo)") Update
        button(v-on:click="deleteTodo(todo.id)") Delete
</template>

<script>
import TodoService from '../services/TodoService.js'

export default {
  name: 'TodoComponent',
  props: {
    user: Object
  },
  data() {
    return {
      todos: [],
      error: '',
      activeTextArea: {
        id: -1,
        title: '',
        completed: true
      },
      newTodoText: '',
    }
  },
  created() {
    this.loadTodos();
  },
  methods: {
    setActiveTextArea(todo) {
      console.log(this.todos);
      if(this.activeTextArea.id != todo.id) {
        this.revertChanges(this.todos[this.todos.findIndex(x => x.id === this.activeTextArea.id)]);

        this.activeTextArea = {
          id: todo.id,
          title: todo.title,
          completed: todo.completed
        };
      }  
    },
    revertChanges(todo) {
      if(todo) {
        todo.title = this.activeTextArea.title;
        todo.completed = this.activeTextArea.completed;
      }
    },
    async loadTodos() {
      try {
        this.todos = await TodoService.getAllByUser(this.user.id);
      } catch(err) {
        this.error = err;
      }
    },
    async createTodo() {
      try {
        this.todos = await TodoService.addTodoForUser(this.user.id, this.newTodoText, this.todos);

        this.activeTextArea = {
          id: -1,
          title: '',
          completed: true
        }
      } catch(err) {
        this.error = err;
      }
    },
    async editTodo(todo) {
      try {
        this.todos = await TodoService.update(todo, this.todos);
        
        this.activeTextArea = {
          id: -1,
          title: '',
          completed: true
        }
      } catch(err) {
        this.error = err;
      }
    },
    async deleteTodo(id, todos) {
      try {
        await TodoService.delete(id, todos);

        this.todos.splice(
          this.todos.findIndex(x => x.id === id),
          1
        );

        this.activeTextArea = {
          id: -1,
          title: '',
          completed: true
        }
      } catch (err) {
        this.error = err;
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="stylus" scoped>
textarea[readonly]
  color grey

.todo[completed="true"]
  border 3px solid green
</style>
