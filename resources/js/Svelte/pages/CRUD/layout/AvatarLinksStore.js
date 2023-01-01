import { writable } from "svelte/store";

let AvatarLinksStore = writable([
    {
        title: "test",
        link: "/cars/create",
    },
    {
        title: "Settings",
        link: "/cars",
    },
    {
        title: "logout",
        link: "/auth/logout",
    },
]);

export default AvatarLinksStore;
