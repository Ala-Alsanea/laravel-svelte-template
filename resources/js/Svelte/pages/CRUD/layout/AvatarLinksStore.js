import { writable } from "svelte/store";

const AvatarLinksStore = writable([{
        title: "Profile",
        link: "/user/",
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