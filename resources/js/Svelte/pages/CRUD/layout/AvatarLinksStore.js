import { writable } from "svelte/store";
let AvatarLinksStore = writable([{
        title: "Settings",
        link: "/cars",
    },
    {
        title: "logout",
        link: "/auth/logout",
    },
]);

export default AvatarLinksStore;