<template>
    <div class="col-md-5 login-form">
        <form>
            <v-text-field
                v-model="form.name"
                label="Name"
                required
                type = "text"
            ></v-text-field>
            <span class="red--text" v-if="errors.name">*{{ errors.name[0] }}</span>
            <v-text-field
                v-model="form.email"
                label="Email"
                required
                type = "email"
            ></v-text-field>
            <span class="red--text" v-if="errors.email">*{{ errors.email[0] }}</span>
            <v-text-field
                v-model="form.password"
                label="Password"
                required
                type = "password"
            ></v-text-field>
            <span class="red--text" v-if="errors.password">*{{ errors.password[0] }}</span>
            <v-text-field
                v-model="form.password_confirmation"
                label="Password Confirmation"
                required
                type = "password"
            ></v-text-field>
          
            <v-checkbox class="form-checkbox"
                label="Do you agree?"
            ></v-checkbox>
            <v-btn 
                class="register-button mb-5" 
                type="submit"
                color="primary"
                @click.prevent = "signup()"
            >sign up</v-btn>
            <router-link :to="{ name: 'login', params: {}}"  class="login-button mb-5">
                 <v-btn outlined color="primary">sign in</v-btn>
            </router-link>
            
        </form>
      </div>
</template>

<script>
export default {
    name: 'register',
    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
            errors: {}
        }
    },
     created(){
      if (User.loggedIn()) {
          this.$router.push({name: 'forum'})
      }
  },
    methods: {
        signup(){
            axios
                .post('api/auth/signup', this.form)
                .then(response => {
                    User.responseAfterLogin(response)
                    this.$router.push({name: 'forum'})
                })
                .catch(error => {
                    this.errored = true
                    this.errors = error.response.data.errors 
                })
        }
    }
}
</script>

<style>
.login-button{
    float: left;
}
.register-button{
    float: right;
}
</style>