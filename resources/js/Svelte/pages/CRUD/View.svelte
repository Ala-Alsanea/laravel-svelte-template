<script context="module">
    import Layout from "./layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    // import Icon from "@iconify/svelte";
    import { Inertia } from "@inertiajs/inertia";
    import Table from "../../shared/items/Table.svelte";

    export let cars;
    // export let can;
    export let alerts;
    let colNames = ["No.", "id", "model", "brand", "color"];
</script>

<main>
    <Table {alerts} resources={cars} {colNames} tableName="cars" />
</main>

<svelte:head>
    <title>View</title>
</svelte:head>

<style>
</style>
