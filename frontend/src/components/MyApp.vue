<template>
  <v-app>
    <v-navigation-drawer
      persistent
      :mini-variant="miniVariant"
      :clipped="clipped"
      v-model="drawer"
      enable-resize-watcher
      fixed
      app
      style="background-color: #1976D2;"
    >
      <v-toolbar style="background-color: #1976D2;" class="transparent" flat>
        <v-list class="pa-0">
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="https://cdn0.iconfinder.com/data/icons/iconshock_guys/512/andrew.png">
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title style="color: #ffffff;">{{ cliente.nombre }} {{ cliente.apellido }}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
      </v-toolbar>
      <v-list class="pt-0" dense style="background: transparent;">
        <v-divider></v-divider>
        <v-list-tile @click="goHome()">
          <v-list-tile-action>
            <v-icon style="color: #ffffff;">home</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title style="color: #ffffff;">Inicio</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list class="pt-0" dense style="background: transparent;" v-if="user.rol == 'Secretaria'">
        <v-list-tile @click="goToClientes()">
          <v-list-tile-action>
            <v-icon>people</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Clientes</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list class="pt-0" dense style="background: transparent;" v-if="user.rol == 'Secretaria'">
        <v-list-tile @click="goToEntrenadores()">
          <v-list-tile-action>
            <v-icon>directions_run</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Entrenadores</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list class="pt-0" dense style="background: transparent;" v-if="user.rol == 'Entrenador'">
        <v-list-tile @click="goHome()">
          <v-list-tile-action>
            <v-icon>fitness_center</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Rutinas</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>

    </v-navigation-drawer>
    <v-toolbar
      app
      :clipped-left="clipped"
      style="background-color: #64B5F6; color: #ffffff;"
    >
      <v-toolbar-side-icon @click.stop="drawer = !drawer" style="color: #ffffff;"></v-toolbar-side-icon>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn @click="logout" flat style="color: #ffffff;">Cerrar Sesión
        <v-icon dark right>exit_to_app</v-icon>
      </v-btn>
    </v-toolbar>
    <v-content>
      <router-view/>
    </v-content>
    <v-footer :fixed="fixed" app class="transparent">
      <span style="color: #ffffff;">&copy; Tim Gym</span>
    </v-footer>
  </v-app>
</template>

<script>
import {loggedService} from '@/services/Logged.service'
import {clienteService} from '@/services/Clientes.service'
import CredentialsService from '@/services/Credentials.service.js'

export default {
  data () {
    return {
      clipped: true,
      drawer: true,
      fixed: false,
      miniVariant: false,
      title: 'Tim Gym',
      user: {},
      cliente: {},
      idProfile: null,
      credentialService: new CredentialsService()
    }
  },
  mounted () {
    let vm = this
    loggedService.query().then(data => {
      vm.user = data.body
      clienteService.getById(vm.user.tgm_cliente_id).then(data => {
        vm.cliente = data.body
      }, erro => {
        console.log('error cliente')
      })
    }, erro => {
      console.log('error user')
    })
  },
  methods: {
    logout () {
      let vm = this
      vm.credentialService.clearCredentials()
      vm.$router.push('/login')
    },
    goHome () {
      let vm = this
      vm.$router.push('/')
    },
    goToClientes () {
      let vm = this
      vm.$router.push('/clientes')
    },
    goToEntrenadores () {
      let vm = this
      vm.$router.push('/entrenadores')
    }
  },
  name: 'App'
}
</script>
