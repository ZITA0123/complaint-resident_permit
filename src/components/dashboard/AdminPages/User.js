import Axios from 'axios'
export default class Users {
    constructor (u) {
      this.u=u
    }
    static getUsers() {
        let user = localStorage.getItem('user')
        Axios.get('http://127.0.0.1:8000/api/users/' + user)
          .then(response => {
            this.users = response.data
            console.log(this.users)
            return this.users

          })
          .catch(error => {
            console.log(error)
            this.errored = true
          })
      }
}