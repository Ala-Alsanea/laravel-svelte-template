<script>
    import { onMount } from "svelte";
    import AvatarLinksStore from "./AvatarLinksStore";
    import SideLinksStore from "./SideLinksStore";
    import LayoutDashboard from "../../../components/layout_dashboard/Layout.svelte";
    import data from "./SideLinksStore";

    let SideLinks = data;
    let AvatarLinks = [];

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
