<script>
    import { onMount } from "svelte";
    import LayoutDashboard from "../../../components/layout_dashboard/Layout.svelte";
    import data from "./data";

    let _Data = data;

    $: console.log("__layout", _Data);
</script>

<LayoutDashboard bind:DataItem={_Data}>
    <slot><!-- optional fallback --></slot>
</LayoutDashboard>
