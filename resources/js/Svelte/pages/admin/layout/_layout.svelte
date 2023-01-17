<script>
    import AvatarLinksStore from "./AvatarLinksStore";
    import SideLinksStore from "./SideLinksStore";
    import LayoutDashboard from "../../../shared/layout_dashboard/Layout.svelte";
    import { Inertia } from "@inertiajs/inertia";
    import { page, inertia } from "@inertiajs/inertia-svelte";

    let SideLinks = [];
    let AvatarLinks = [];

    // console.log("page", $page);

    AvatarLinksStore.subscribe((data) => {
        AvatarLinks = data;
        AvatarLinks = [
            {
                title: `Profile - (${$page.props.auth.user.username})`,
                link: `/user/${$page.props.auth.user.id}`,
            },
            ...AvatarLinks,
        ];
    });

    SideLinksStore.subscribe((data) => {
        SideLinks = data;
    });
</script>

<LayoutDashboard bind:SideLinks bind:AvatarLinks>
    <slot><!-- optional fallback --></slot>
</LayoutDashboard>
