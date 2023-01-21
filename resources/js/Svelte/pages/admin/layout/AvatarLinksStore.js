import { writable } from "svelte/store";
const AvatarLinksStore = writable([{
    title: "logout",
    link: "/auth/logout",
}, ]);

export default AvatarLinksStore;