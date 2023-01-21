<!-- svelte-ignore a11y-label-has-associated-control -->
<script context="module">
    import Layout from "../layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { Inertia } from "@inertiajs/inertia";
    let data = {
        name: null,
        email: null,
        role: "pick role",
    };

    export let roles;
    export let errors;
    let errorList = [];

    // fun
    $: {
        errorList = Object.values(errors);

        console.table("roles", roles);
    }

    function handelSubmit() {
        console.log("post", data);
        Inertia.post("/admin/user/register", data);
    }

    $: {
    }
</script>

<main>
    <h1 class="text-5xl font-bold mb-9 ml-8 capitalize">register user</h1>
    <div class=" ">
        <form
            action=""
            on:submit|preventDefault={handelSubmit}
            class="flex flex-col gap-3 items-center bg-slate-50 border border-primary rounded-md p-5 mx-80 "
        >
            <!-- username -->
            <div class=" w-full max-w-xs">
                <label class="label">
                    <span class="label-text capitalize"> username</span>
                </label>
                <input
                    type="text"
                    placeholder="Type here"
                    name="name"
                    class="input w-full  input-primary"
                    required
                    bind:value={data.name}
                />
            </div>

            <!-- email -->
            <div class=" w-full max-w-xs">
                <label class="label">
                    <span class="label-text capitalize"> email</span>
                </label>
                <input
                    type="text"
                    placeholder="Type here"
                    name="email"
                    class="input w-full  input-primary"
                    required
                    bind:value={data.email}
                />
            </div>

            <!-- roles -->
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text capitalize">roles</span>
                </label>
                <select
                    name="role"
                    class="select select-primary"
                    required
                    bind:value={data.role}
                >
                    <option disabled selected>{data.role}</option>
                    {#each roles as role}
                        <option>{role.data}</option>
                    {/each}
                </select>
            </div>

            <!-- errors -->
            {#if errorList.length != 0}
                <div class="alert-error p-3 rounded-lg">
                    {#each errorList as error}
                        <p>&blacktriangleright; {error}</p>
                    {/each}
                </div>
            {/if}

            <button class=" btn btn-success md:w-20"> register </button>
        </form>
    </div>
</main>

<svelte:head>
    <title>create</title>
</svelte:head>
