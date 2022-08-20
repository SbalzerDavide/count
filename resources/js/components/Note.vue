<template>
    <div class="notes">
      <h3>elenco delle note</h3>
      <ul>
        <li 
        v-for="(note, index) in notes" 
        :key="index"
        @click="showNote(note.id)"
        >
          {{ note.title }}
        </li>
      </ul>
      <button @click="addNewNote">nuova nota</button>
    </div>
</template>

<script>

    export default {
        name: "Note",
        data(){
            return{
              notes:[],
              idFolder: 0,
              loader: false
            }
        },
        watch: {
          loader() {
            let showLoader = new CustomEvent('showLoader', 
              { detail: {
                      show: this.loader,
                  }
              });
            dispatchEvent(showLoader)
          }
        },
        created(){
          this.loader = true;
          this.idFolder = this.$route.params.idFolder;
          let vue = this;
          axios
            .get('http://127.0.0.1:8000/api/note/', {
              params: {
                userInfo: window.userInfoEncode,
                idFolder: vue.idFolder
              }
            })
            .then(response => {
              vue.notes = response.data;
              vue.loader = false;
            }
          )
        },
        methods:{
            addNewNote(){
              // go to route for add new note
              let parameters = {
                idFolder: this.idFolder
              }
              this.$router.push({ name: 'addNote', params: parameters })
            },
            showNote(idNote){
              let parameters = {
                idNote: idNote,
                idFolder: this.idFolder
              }
              this.$router.push({ name: 'showNote', params: parameters })
            }
        }
    }
</script>
