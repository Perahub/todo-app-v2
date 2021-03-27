<template lang="pug">
.wrapper
  h1 {{ `Welcome to my Todo App, ${ user ? user.username : 'Guest'}!` }}
  .login-form-container
    input#inputUsername(type="text" placeholder="Username" v-model="username")
    input#inputPassword(type="password" placeholder="Password" v-model="password")
    button(v-on:click="login") Login
</template>

<script>
import UserService from '../services/UserService.js'

export default {
  name: 'LoginComponent',
  props: {
    user: Object
  },
  data() {
    return {
      username: '',
      password: '',
      error: ''
    }
  },
  async created() {
    
  },
  methods: {
    login: async function() {
      try {
        const user = await UserService.authenticate(this.username, this.password);
        this.$emit('updateCurrentUser', user);
      } catch(err) {
        this.error = err;
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="stylus" scoped>
.login-form-container
  width 70%
  display flex
  flex-direction column
  align-items center
  justify-content center
  margin auto

.login-form-container input
  width 175px
  margin 10px 0
</style>
