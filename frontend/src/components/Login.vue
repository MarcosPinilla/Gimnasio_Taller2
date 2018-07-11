<template>
  <v-app flat style="background-color: #1976D2">
    <v-card style="background-color: #1976D2" flat>
      <br><br>
      <v-layout row>
        <v-flex xs10 offset-xs1 md6 offset-md3>
          <center>
            <v-layout>
              <v-flex xs8 offset-xs2 md6 offset-md3 class="text-xs-center">
                <h1 style="color: #ffffff" dark>TIM GYM</h1>
              </v-flex>
            </v-layout>
            <br><br>
            <v-card style="v-card {width: 370px; height: 300px; background-color: #64B5F6;} @media only screen and (max-width: 300px;background-color: #64B5F6;){v-card {width: 250px;background-color: #64B5F6;}}">
              <br><br>
              <v-layout row wrap>
                <v-flex xs8 offset-xs2>
                  <v-form>
                    <v-text-field label="Email" type="email" v-model="credentials.usu_correo" color="lime" dark ></v-text-field>
                    <v-text-field label="Contraseña" type="password" v-model="credentials.password" color="lime" dark required></v-text-field>
                    <small v-if="errorLogin" class="red--text">Email o Password Incorrectos</small>
                    <v-btn :loading="isLoading" @click="submit(credentials)" :disabled="!isValidForm" block style="border-radius: 7px; background-color: #64B5F6; );" color="lime" dark>Iniciar Sesión</v-btn>
                  </v-form>
                </v-flex>
              </v-layout>
            </v-card>
          </center>
        </v-flex>
      </v-layout>
    </v-card>
  </v-app>
</template>

<script>
import {loginService} from '@/services/Login.service'
import CredentialsService from '@/services/Credentials.service.js'

export default {
  data () {
    return {
      isLoading: false,
      credentials: {
        usu_correo: '',
        password: ''
      },
      errorLogin: false,
      credentialService: new CredentialsService()
    }
  },
  methods: {
    submit (credentials) {
      let vm = this
      vm.isLoading = true
      loginService.save(credentials).then(data => {
        vm.credentialService.setToken(data.body.token)
        // vm.credentialService.setCurrentUser(data.body.users)
        vm.$router.push('/')
      }, () => {
        vm.errorLogin = true
        vm.isLoading = false
      })
    }
  },
  computed: {
    isValidForm () {
      let vm = this
      return vm.credentials.usu_correo !== '' && this.credentials.password !== ''
    }
  }
}
</script>
