<template>
    <div class="folders">
      <h3>ecco tutte le cartelle</h3>
      <ul>
        <li v-for="(folder, index) in folders" :key="index">
          {{ folder.name }}
        </li>
      </ul>
      <button @click="addNewFolder">nuova cartella</button>
      <input type="text" v-model="nameFolder">
      <router-link :to="{name:'homeVue'}">Torna alla pagina principale</router-link>
      <button @click="showFirstFolder">mostra prima cartella</button>

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
            showFirstFolder(){
              console.log("show first folder");
              let vue = this;
              console.log("add new folder");
              axios.get(`http://127.0.0.1:8000/api/folder/1`)
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

            }
        }
    }
</script>
