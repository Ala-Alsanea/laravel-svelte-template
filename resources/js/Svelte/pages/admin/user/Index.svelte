<script context="module">
    import Layout from "../layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    // import Icon from "@iconify/svelte";
    import { Inertia } from "@inertiajs/inertia";
    import Table from "../component/UserTable.svelte";

    export let user;

    // console.table(user.data);

    export let alerts;
    let colNames = ["No.", "name", "email", "role"];
</script>

<main>
    <Table {alerts} resources={user} {colNames} tableName="users" />
</main>

<svelte:head>
    <title>View</title>
</svelte:head>

<style>
</style>
