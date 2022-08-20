import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import RouterComponent from '../components/RouterComponent.vue';
import HomeVue from '../components/HomeVue.vue';
import Folder from '../components/Folder.vue';
import Note from '../components/Note.vue';
import AddNote from '../components/AddNote.vue';
import ShowNote from '../components/ShowNote.vue';

const router = new VueRouter({
    routes: [
        // {
        //     path: "/user/:id",
        //     component: User,
        //     // children: [{
        //     //         path: "/user/:id",
        //     //         component: User,    
        //     //     },
        //     //     {
        //     //         path: "/user/:id",
        //     //         component: User,
        //     //     }
        //     // ]
        // },
        {
            path: "/",
            name: "homeVue",
            component: HomeVue,
        },
        {
            path: "/first",
            name: "first",
            component: RouterComponent,
        },
        {
            path: "/folders",
            name: "folders",
            component: Folder,
        },
        {
            path: "/notes",
            name: "notes",
            component: Note,
        },
        {
            path: "/addNote",
            name: "addNote",
            component: AddNote,
        },
        {
            path: "/ShowNote",
            name: "showNote",
            component: ShowNote,
        }
    ]
  })
export default router;