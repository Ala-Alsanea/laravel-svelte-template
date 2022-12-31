<script>
    import { onMount } from "svelte";
    import { page } from "@inertiajs/inertia-svelte";
    // import { page } from '$app/stores';
    // import { browser } from "../../config/app/env";
    // import { browser } from "$app/env";
    import { open } from "./provider/store";
    import Overlay from "./provider/Overlay.svelte";
    import TopNavigation from "./topnavigation/Index.svelte";
    import SideNavigation from "./sidenavigation/Index.svelte";

    /*w-[calc(100%-16rem)] class get the remain width of the main tag from lg:viewport by subtracting
	(the total width by the width of the side navigation component which is w-64 = 16rem)*/

    export let DataItem;

    const style = {
        container: `  h-screen overflow-hidden relative`,
        mainContainer: `lg:w-[calc(100%-16rem)] `,
        main: ` md:pb-8 md:pt-4 md:px-8 lg:pt-0 `,
    };

    onMount(() => {
        document
            .getElementsByTagName("body")
            .item(0)
            .removeAttribute("tabindex");
    });

    // if (browser) {
    page.subscribe(() => {
        // close side navigation when route changes when viewport is less than 1024px
        if (window.innerWidth < 1024) {
            $open = false;
        }
    });
    // }
</script>

<div class="container  ">
    <div class="flex items-start">
        <Overlay />
        <SideNavigation bind:DataItem mobilePosition="right" />
        <div class="mainContainer bg-primary {style.mainContainer}">
            <TopNavigation />
            <main
                class="main rounded-2xl bg-white m-2 mt-0 md:ml-0  {style.main}"
            >
                <slot />
            </main>
        </div>
    </div>
</div>

<style>
    .container {
        @apply h-screen overflow-hidden relative;
    }
    .mainContainer {
        @apply flex flex-col h-screen pl-0 w-full;
    }
    .main {
        @apply h-screen overflow-auto pb-36 pt-8 px-2;
    }
</style>
