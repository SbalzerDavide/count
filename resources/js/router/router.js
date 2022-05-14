import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import RouterComponent from '../components/RouterComponent.vue';
import HomeVue from '../components/HomeVue.vue';
import Folder from '../components/Folder.vue';

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
        }
    ]
  })
export default router;