<script>
    import { onMount } from "svelte";
    import AvatarLinksStore from "./AvatarLinksStore";
    import SideLinksStore from "./SideLinksStore";
    import LayoutDashboard from "../../../shared/layout_dashboard/Layout.svelte";
    import data from "./SideLinksStore";
    import { Inertia } from "@inertiajs/inertia";
    import { page, inertia } from "@inertiajs/inertia-svelte";

    let SideLinks = data;
    let AvatarLinks = [];

    console.log("page", $page);

    if ($AvatarLinksStore.length < 3) {
        AvatarLinksStore.update((current) => {
            return [
                {
                    title: `Profile - (${$page.props.auth.user.username})`,
                    link: `/user/${$page.props.auth.user.id}`,
                },
                ...current,
            ];
        });
    }

    AvatarLinksStore.subscribe((data) => {
        AvatarLinks = data;
    });

    SideLinksStore.subscribe((data) => {
        SideLinks = data;
    });
    console.log("$AvatarLinksStore", $AvatarLinksStore);
</script>

<LayoutDashboard bind:SideLinks bind:AvatarLinks>
    <slot><!-- optional fallback --></slot>
</LayoutDashboard>
