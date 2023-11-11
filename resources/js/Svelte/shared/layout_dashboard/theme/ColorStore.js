import { writable } from "svelte/store";

let ColorStore = writable({
    items: {},
    bg: {
        white: "bg-white",
    },
});

export default ColorStore;