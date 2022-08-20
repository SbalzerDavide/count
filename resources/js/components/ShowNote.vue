<template>
    <div class="new-note">
      <div class="main">
        <h3>show notes</h3>
        <div class="activeNote">
          <h4>{{ note.title }}</h4>
          <p>{{ note.content }}</p>
        </div>
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
              idNote: Number,
              idFolder: Number,
              note: {},
            }
        },
        created(){
          this.idNote = this.$route.params.idNote;
          this.idFolder = this.$route.params.idFolder;
          console.log("id note: ", this.idNote);
          let vue = this;
            axios
              .get(`http://127.0.0.1:8000/api/note/${vue.idNote}`)
              .then(response => {
                console.log(response.data);
                vue.note = response.data;
              }
          )
        },
        methods:{
          backToFolder(){
            let parameter = {
              idFolder: this.idFolder
            }
            // this.$router.push('/notes');
            this.$router.push({ name: 'notes', params: parameter })
          }
        }
    }
</script>

<style >
  textarea{
    resize: none;
  }
</style>
