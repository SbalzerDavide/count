<template>
    <div class="add-note">
      <h3>nuova nota</h3>
      <p>Stai creando una note nella cartella con id {{ idFolder }}</p>
      <div class="parameter">
        <input placeholder="title" v-model="title" type="text">
        <input placeholder="type" v-model="type" type="text">
      </div>
      <div class="content">
        <textarea v-model="content" name="" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="action">
        <button @click="addNewNote">salva nota</button>
      </div>
      <div class="footer" @click="backToFolder">
        torna alla cartella
      </div>
    </div>
</template>

<script>

    export default {
        name: "AddNote",
        data(){
            return{
              idFolder: Number,
              type: "",
              title: "",
              content: "",
              star: false
            }
        },
        created(){
          this.idFolder = this.$route.params.idFolder;
        },
        methods:{
          addNewNote(){
            let vue = this;
            console.log("add new note");
            if(typeof this.folder_id === "undefined"){
              // chiedi a quale cartella volgiono associare la nota e ricava da lì folder_id
              console.log("chiedi cartella");
            }
            console.log(this.idFolder);
            axios.post('http://127.0.0.1:8000/api/note', {
                title: vue.title,
                type: vue.type,
                content: vue.content,
                star: vue.star,
                folder_id: vue.idFolder
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
          },
          backToFolder(){
            let parameter = {
              idFolder: this.idFolder
            }
            this.$router.push({ name: 'notes', params: parameter })
          }
        }
    }
</script>

<style>
  textarea{
    resize: none;
  }
</style>
