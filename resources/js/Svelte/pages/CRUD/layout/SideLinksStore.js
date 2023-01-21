import HomeIcon from "./icons/HomeIcon.svelte";
import MediasIcon from "./icons/MediasIcon.svelte";
import ContactIcon from "./icons/ContactIcon.svelte";
import ServersIcon from "./icons/ServersIcon.svelte";
import TerminalIcon from "./icons/TerminalIcon.svelte";
import RecycleBinIcon from "./icons/RecycleBin.svelte";
import DocumentationIcon from "./icons/DocumentationIcon.svelte";
import { writable } from "svelte/store";

let SideLinksStore = writable([{
        section: "general",
        content: [{
                title: "cars",
                icon: MediasIcon,
                link: "/cars",
                component: "pages/CRUD/View",
            },

            {
                title: "test",
                icon: MediasIcon,
                link: "/test",
                component: "",
            },
        ],
    },
    {
        section: "tab 2",
        content: [{
                title: "view",
                icon: MediasIcon,
                link: "/view",
                component: "pages/CRUD/View",
            },

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