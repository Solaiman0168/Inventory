import Token from './Token'
import AppStorage from './AppStorage'

class User{
    responseAfterLogin(response){
        const access_token = response.data.access_token
        const username = response.data.name
    }
}

export default User = new User()