<template>
  <TodoComponent/>
</template>

<script>
import TodoComponent from './components/TodoComponent.vue'

export default {
  name: 'App',
  components: {
    TodoComponent
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
