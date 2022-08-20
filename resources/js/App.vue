<template>
    <div class="first">
        <div v-show="loader" class="loader-container">
            <div class="loader">
                <i class="fa-solid fa-circle-notch"></i>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: "App",
        data(){
            return{
                loader: false
                // folders: [],
                // nameFolder: "",
            }
        },
        created(){
            let vue = this;
            // chiamata all'api example per ricavare folder
            let elementUser = document.getElementById("userInfo");
            window.userInfo = {
                userId: elementUser.getAttribute("myId"),
                userName: elementUser.getAttribute("myUserName")
            }
            window.userInfoEncode = btoa(JSON.stringify(window.userInfo));
            window.addEventListener("showLoader",(e)=>{
                console.log(e);
                console.log("evento ascoltato");
                vue.loader = e.detail.show;
            })


            
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
<style lang="scss">
    .loader-container{
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,.1);
        .loader{
            color: #f15bb5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-size: 60px;
            animation: load 1s linear infinite;
        }
    }
    @keyframes load{
        0% {transform: rotate(0);}
        50% {transform: rotate(180deg);}
        100% {transform: rotate(360deg);}
    }
</style>


