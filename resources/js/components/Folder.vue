<template>
    <div class="folders">
      <h3>ecco tutte le cartelle</h3>
      <ul>
        <li 
        v-for="(folder, index) in folders" 
        :key="index"
        @click="openFolder(folder.id)"
        >
          {{ folder.name }}
        </li>
      </ul>
      <button @click="addNewFolder">nuova cartella</button>
      <input type="text" v-model="nameFolder">
      <router-link :to="{name:'homeVue'}">Torna alla pagina principale</router-link>
    </div>
</template>

<script>

    export default {
        name: "Folder",
        data(){
            return{
              folders:[],
              nameFolder: ""
            }
        },
        created(){
            // chiamata all'api example per ricavare folder
            let vue = this;
             axios
                .get('http://127.0.0.1:8000/api/folder/', {
                  params: {
                    userInfo: window.userInfoEncode
                  }
                })
                .then(response => {
                    console.log(response.data);
                    vue.folders = response.data;
                }
            )
        },
        methods:{
            openFolder(index){
              // invece di fare la chiamata direttamente passo i parametri alla rotta notes, la quale si preoccuperà di fare la chiamata di rete per ottenere i dati dal server
              let parameter = {
                idFolder: index
              }
              this.$router.push({ name: 'notes', params: parameter })
            },
            addNewFolder(){
                let vue = this;
                console.log("add new folder");
                axios.post('http://127.0.0.1:8000/api/folder', {
                    name: vue.nameFolder,
                    id: window.userInfo.userId
                })
                .then(function (response) {
                    console.log(response);
                    vue.folders.push({
                        name: vue.nameFolder,
                      }
                    )
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
        }
    }
</script>
