<template lang="pug">
LoginComponent(v-bind:user="currentUser" @updateCurrentUser="updateCurrentUser")
TodoComponent(v-if="currentUser" v-bind:user="currentUser")
</template>

<script>
import TodoComponent from './components/TodoComponent.vue'
import LoginComponent from './components/LoginComponent.vue'

export default {
  name: 'App',
  components: {
    TodoComponent,
    LoginComponent
  },
  data() {
    return {
      currentUser: null
    }
  },
  methods: {
    updateCurrentUser(user) {
      console.log("Logged in with");
      console.log(user)
      this.currentUser = user;
    }
  }
}
</script>

<style lang="stylus">
#app
  font-family Avenir, Helvetica, Arial, sans-serif
  -webkit-font-smoothing antialiased
  -moz-osx-font-smoothing grayscale
  text-align center
  color #2c3e50
  margin-top 60px
  display flex
  flex-direction column

.wrapper
  width 50%
  align-self center
</style>
