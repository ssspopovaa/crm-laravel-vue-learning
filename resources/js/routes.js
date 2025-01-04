import Admin from "./components/Admin.vue";
import UserList from "./components/UserList.vue";
import UserPage from "./components/UserPage.vue";

const routes = [
    {
        path: '/admin',
        component: Admin
    },
    {
        path: '/users',
        component: UserList
    },
    {
        path: '/users/:name',
        component: UserPage
    },
]

export default routes;
