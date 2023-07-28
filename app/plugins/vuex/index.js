import { createStore } from 'vuex';


const store = createStore({
    state () {
      return {
        "nome_user": "test",
        "sobrenome_user": "test",
        "email_user": "test",
        "foto_perfil_user": "test"
      }
    }
})

export default store