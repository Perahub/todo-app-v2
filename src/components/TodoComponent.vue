<template lang="pug">
.wrapper
  h1 Your Todos
  hr
  p.error(v-if="error") {{ error }}
  .todos-container#sasa
    .todo(
      v-for="todo, index in todos"
      v-bind:item="todo"
      v-bind:index="index"
      v-bind:key="todo.id"
      v-bind:completed="todo.completed"
    )
      input(type="checkbox" v-bind:checked="todo.completed" v-on:click="todo.completed = !todo.completed")
      textarea(v-on:click="activeTextArea = todo.id" v-bind:readonly="activeTextArea != todo.id") {{ todo.title }}
</template>

<script>
import TodoService from '../services/TodoService.js'

export default {
  name: 'TodoComponent',
  data() {
    return {
      todos: [],
      error: '',
      activeTextArea: -1, 
    }
  },
  async created() {
    try {
      this.todos = await TodoService.fetchAll();
    } catch(err) {
      this.error = err;
    }
  },
  methods: {
    
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
