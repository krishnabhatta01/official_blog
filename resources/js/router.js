import { createRouter, createWebHistory } from "vue-router";
import home from "./pages/home.vue";
import tags from "./admin/pages/tags.vue";
import category from "./admin/pages/category.vue";




const routes = [
    {
        path: "/",
        name: "home",
        component: home,
    },
    {
        path: "/tags",
        name: "tags",
        component: tags,
    },
    {
        path: "/category",
        name: "category",
        component: category,
    },
    
    
    
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
