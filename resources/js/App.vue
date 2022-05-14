<template>
    <div class="first">
        <!-- <h2>sono il ponte tra il mondo di laravel e quello di Vue js</h2> -->

        <!-- per andare alla rotta indicata -->
        <!-- si mouve semplicemente ad una rotta interna a vue -->
        <!-- nella visualizzazione va a sostituire quello che è dentro il file HomeVue.vue -->
        <!-- <router-link :to="{name:'first'}">vai alla prima rotta con vue</router-link>
        <router-link :to="{name:'folders'}">Visualizza tutte le tue cartelle</router-link> -->

        <!-- qui viene randerizzato tutto quello che è indicato nel componente HomeVue
        come impostato nel router per il percorso "/" -->
        <router-view></router-view>


        <!-- <div class="folders">
            <h1>cartelle arrivate da DB:</h1>
            <ul>
                <li v-for="(folder, index) in folders" :key="index">
                    {{ folder.name }}
                </li>
            </ul>
        </div>

        <button @click="addNewFolder">nuova cartella</button>
        <input type="text" v-model="nameFolder"> -->
    </div>
</template>

<script>

    export default {
        name: "App",
        data(){
            return{
                // folders: [],
                // nameFolder: "",
            }
        },
        created(){
            // chiamata all'api example per ricavare folder
            let elementUser = document.getElementById("userInfo");
            window.userInfo = {
                userId: elementUser.getAttribute("myId"),
                userName: elementUser.getAttribute("myUserName")
            }
            window.userInfoEncode = btoa(JSON.stringify(window.userInfo));

            
            // let vue = this;
            //  axios
            //     .get('http://127.0.0.1:8000/api/folder')
            //     .then(response => {
            //         console.log(response.data);
            //         vue.folders = response.data;
            //         // console.log(vue.folders);
            //     }
            // )
        },
        methods:{
            // addNewFolder(){
            //     let vue = this;
            //     console.log("add new folder");
            //     axios.post('http://127.0.0.1:8000/api/folder', {
            //         name: vue.nameFolder,
            //         id: window.userId
            //     })
            //     .then(function (response) {
            //         console.log(response);
            //     })
            //     .catch(function (error) {
            //         console.log(error);
            //     });
            // }
        }
    }
</script>
