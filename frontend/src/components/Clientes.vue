<template>
  <v-app style="background-color: #ffffff;" >
    <v-container fluid>
      <v-card>
        <v-card-title>
          <h2>Clientes</h2>
          <v-spacer></v-spacer>

        </v-card-title>
        <br><br>
        
        <v-layout row justify-center>
          <v-dialog v-model="dialog" persistent max-width="500px">
            <v-btn slot="activator" style="color: #ffffff;background-color:  #1976D2" dark>Agregar Cliente</v-btn>
            <v-card style="background-color:  #1976D2">
              <v-card-title>
                <span style="color: #ffffff;" class="headline">Cuenta de Cliente</span>
              </v-card-title>
              <v-card-text>
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Email"
                        type="text"
                        :rules="rules"
                        v-model="nuevoCliente.email" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <v-flex xs12>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Password" 
                        type="password"
                        :rules="rules"
                        v-model="nuevoCliente.password"  
                        required
                        >
                      </v-text-field>
                    </v-flex>
                  </v-layout>
                </v-container>
              </v-card-text>

              <v-card-title>
                <span style="color: #ffffff;" class="headline">Datos del Cliente</span>
              </v-card-title>
              <v-card-text>
                <v-container grid-list-md>
                  <v-layout wrap>
                    <v-flex xs12 sm6 md6>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Nombre"
                        type="text"
                        :rules="rules" 
                        v-model="nuevoCliente.nombre" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6 md6>
                      <v-text-field 
                        color="light-green lighten-1" 
                        dark 
                        label="Apellidos"
                        type="text"
                        :rules="rules" 
                        v-model="nuevoCliente.apellidos" 
                        required
                        >
                      </v-text-field>
                    </v-flex>
                    <br><br>
                  </v-layout>
                </v-container>
                <small style="color: red;">*Campos Obligatorios</small>
              </v-card-text>
              <v-card-actions>
                <v-btn color="blue darken-1" flat @click="dialog = false">Cancelar</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click="registrarCliente(nuevoCliente)">Guardar</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-layout>

        <br><br>
        <v-divider></v-divider>
      </v-card>
      <v-divider></v-divider>
      <br>
      <v-layout row wrap justify-center>
        <v-flex offset-md1 xs12 sm3 md3 v-for="cliente in clientes" :key="cliente.id" >
          <v-card>
            <v-card-media
              src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
              height="200px"
            ></v-card-media>

            <v-card-title primary-title>
              <div>
                <h3 class="headline mb-0">{{ cliente.nombre }} {{ cliente.apellido}}</h3>
                <div>Cliente</div>
              </div>
            </v-card-title>

            <v-card-actions>
              <v-btn flat color="orange">VER</v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-app>
</template>

<script>
import {clienteService} from '@/services/Clientes.service'

export default {
  data () {
    return {
      search: '',
      headers: [
        {
          text: 'id',
          align: 'left',
          sortable: false,
          value: 'id'
        },
        { text: 'Rut', value: 'rut' },
        { text: 'Nombre', value: 'nombre' },
        { text: 'Apellidos', value: 'apellidos' },
        { text: 'Perfil' }
      ],
      clientes: [],
      nuevoCliente: {},
      dialog: false,
      rules: [
        v => !!v || 'Campo Requerido'
      ],
      items: [
        { text: 'Entrenador', value: 2 },
        { text: 'Cliente', value: 3 }
      ]
    }
  },
  mounted () {
    let vm = this
    clienteService.query().then(data => {
      vm.clientes = data.body
      console.log(vm.clientes)
    }, erro => {
      console.log('error')
    })
  },
  methods: {
    registrarCliente (nuevoCliente) {
      let vm = this
      clienteService.save(nuevoCliente).then(data => {
        vm.nuevoCliente = data.body
        console.log(vm.nuevoCliente)
        vm.clientes.push(nuevoCliente)
        vm.dialog = false
        vm.nuevoCliente = {}
      }, err => {
        alert('ERROR. Intente nuevamente')
        console.log(err)
      })
    },
    goToUserProfile (id) {
      let vm = this
      vm.$router.push({name: 'userprofile', params: {id: id}})
    }
  }
}
</script>
