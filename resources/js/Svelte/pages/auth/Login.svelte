<script>
    import { Inertia } from "@inertiajs/inertia";
    import { inertia } from "@inertiajs/inertia-svelte";

    //
    let loginInfo = { email: "", password: "" };

    export let errors;
    let errorList = [];

    // fun
    $: {
        errorList = Object.values(errors);
        console.log("errorList", errorList);
        console.log("errors", errors);
    }

    let handelSubmit = () => {
        Inertia.post("/auth/login", loginInfo);
    };
</script>

<!-- svelte-ignore a11y-label-has-associated-control -->

<main>
    <!--  -->
    <h1 class="text-5xl font-bold text-center my-20 capitalize">login</h1>
    <div class="border border-primary rounded-md p-5 mx-96 ">
        <form
            action="/auth/login"
            method="post"
            on:submit|preventDefault={handelSubmit}
            class="flex flex-col gap-3 items-center"
        >
            <!-- email -->
            <div class=" w-full max-w-xs">
                <label class="label">
                    <span class="label-text capitalize">email </span>
                </label>
                <input
                    type="text"
                    placeholder="Type here"
                    name="email"
                    class="input w-full  input-primary"
                    bind:value={loginInfo.email}
                />
            </div>

            <!-- password -->
            <div class=" w-full max-w-xs">
                <label class="label">
                    <span class="label-text capitalize">password </span>
                </label>
                <input
                    type="password"
                    placeholder="Type here"
                    name="password"
                    class="input w-full  input-primary"
                    bind:value={loginInfo.password}
                />
            </div>

            <!-- errors -->
            {#if errorList.length != 0}
                <div class="alert-error p-3">
                    {#each errorList as error}
                        <p>{error}</p>
                    {/each}
                </div>
            {/if}

            <button class=" btn btn-primary md:w-20"> login</button>
        </form>
    </div>
</main>
