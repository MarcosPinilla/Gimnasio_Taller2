import ApiService from './Api.service.js'

class LoggedService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const loggedService = new LoggedService('token')
