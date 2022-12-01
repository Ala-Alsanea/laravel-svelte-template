import HomeIcon from "./icons/HomeIcon.svelte";
import MediasIcon from "./icons/MediasIcon.svelte";
import ContactIcon from "./icons/ContactIcon.svelte";
import ServersIcon from "./icons/ServersIcon.svelte";
import TerminalIcon from "./icons/TerminalIcon.svelte";
import RecycleBinIcon from "./icons/RecycleBin.svelte";
import DocumentationIcon from "./icons/DocumentationIcon.svelte";

const data = [{
    section: "APPLICATIONS",
    content: [{
            title: "index",
            icon: HomeIcon,
            link: "/",
        },
        {
            title: "home",
            icon: MediasIcon,
            link: "/home",
        },
        {
            title: "Contacts",
            icon: ContactIcon,
            link: "",
        },
    ],
}, ];

export default data;