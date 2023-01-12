import HomeIcon from "./icons/HomeIcon.svelte";
import MediasIcon from "./icons/MediasIcon.svelte";
import ContactIcon from "./icons/ContactIcon.svelte";
import ServersIcon from "./icons/ServersIcon.svelte";
import TerminalIcon from "./icons/TerminalIcon.svelte";
import RecycleBinIcon from "./icons/RecycleBin.svelte";
import DocumentationIcon from "./icons/DocumentationIcon.svelte";
import { writable } from "svelte/store";

const SideLinksStore = writable([
    {
        section: "general",
        content: [
            {
                title: "dashboard",
                icon: HomeIcon,
                link: "/admin/dashboard",
                component: "pages/admin/View",
            },
        ],
    },
    {
        section: "tab 2",
        content: [
            {
                title: "users",
                icon: MediasIcon,
                link: "/admin/user",
                component: "pages/admin/user/Index",
            },
        ],
    },
    {
        section: "tab 3",
        content: [
            {
                title: "not found 404",
                icon: MediasIcon,
                link: "/test",
                component: "",
            },
        ],
    },
]);

export default SideLinksStore;
