<script context="module">
    import Layout from "./layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { Inertia } from "@inertiajs/inertia";

    export let errors = {};

    let values = {
        first_name: null,
        last_name: null,
        email: null,
    };

    $: console.log(errors);

    function handleSubmit() {
        Inertia.post("/store", values);
    }
</script>

<form class="flex flex-col px-52" on:submit|preventDefault={handleSubmit}>
    <!-- ############# -->

    <label for="first_name">First name:</label>
    <input
        class="border-black border-2 p-2"
        id="first_name"
        bind:value={values.first_name}
    />
    {#if errors.first_name}
        <div class="text-red-500">
            {errors.first_name}
        </div>
    {/if}
    <!-- ############# -->

    <label for="last_name">Last name:</label>
    <input
        class="border-black border-2 p-2"
        id="last_name"
        bind:value={values.last_name}
    />
    {#if errors.last_name}
        <div class="text-red-500">
            {errors.last_name}
        </div>
    {/if}
    <!-- ############# -->

    <label for="email">Email:</label>
    <input
        class="border-black border-2 p-2"
        id="email"
        bind:value={values.email}
    />
    {#if errors.email}
        <div class="text-red-500">
            {errors.email}
        </div>
    {/if}
    <!-- ############# -->
    <button class="mt-4 border-red-900 border-2 block" type="submit"
        >Submit</button
    >
</form>
<!-- config -->
<svelte:head>
    <title>index</title>
</svelte:head>
