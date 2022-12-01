// import "./bootstrap";
import { createInertiaApp } from "@inertiajs/inertia-svelte";
import { InertiaProgress } from "@inertiajs/progress";

createInertiaApp({
    resolve: async(name) => {
        let page = await
        import (`./Svelte/${name}.svelte`);
        return page;
    },
    setup({ el, App, props }) {
        new App({ target: el, props });
    },
});

InertiaProgress.init({});