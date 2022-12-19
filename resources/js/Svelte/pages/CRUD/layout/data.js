import HomeIcon from "./icons/HomeIcon.svelte";
import MediasIcon from "./icons/MediasIcon.svelte";
import ContactIcon from "./icons/ContactIcon.svelte";
import ServersIcon from "./icons/ServersIcon.svelte";
import TerminalIcon from "./icons/TerminalIcon.svelte";
import RecycleBinIcon from "./icons/RecycleBin.svelte";
import DocumentationIcon from "./icons/DocumentationIcon.svelte";

const data = [{
    section: "test",
    content: [{
            title: "view",
            icon: MediasIcon,
            link: "/view",
            component: "pages/CRUD/View",
        },
        {
            title: "create",
            icon: MediasIcon,
            link: "/create",
            component: "pages/CRUD/Create",
        },
        {
            title: "test",
            icon: MediasIcon,
            link: "/test",
            component: "",
        },
    ],
}, ];

export default data;