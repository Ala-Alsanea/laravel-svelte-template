<script>
    import { onMount } from "svelte";
    import AvatarLinksStore from "./AvatarLinksStore";
    import SideLinksStore from "./SideLinksStore";
    import LayoutDashboard from "../../../shared/layout_dashboard/Layout.svelte";
    import data from "./SideLinksStore";
    import { Inertia } from "@inertiajs/inertia";
    import { page, inertia } from "@inertiajs/inertia-svelte";

    let props = Inertia.page.props;
    let SideLinks = data;
    let AvatarLinks = [];

    // console.log("page", $page);

    AvatarLinksStore.subscribe((data) => {
        AvatarLinks = data;
    });

    SideLinksStore.subscribe((data) => {
        SideLinks = data;
    });
</script>

<LayoutDashboard bind:SideLinks bind:AvatarLinks>
    <slot><!-- optional fallback --></slot>
</LayoutDashboard>
