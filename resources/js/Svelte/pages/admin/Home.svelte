<script context="module">
    import Layout from "./layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { inertia } from "@inertiajs/inertia-svelte";
    let a = "sieee";
</script>

<main>
    <p class="text-red-600">
        home {a} ttt
    </p>

    <button class="btn btn-primary" use:inertia={{ href: "dashboard" }}
        >dashboard</button
    >
</main>

<svelte:head>
    <title>home</title>
</svelte:head>

<style>
</style>
