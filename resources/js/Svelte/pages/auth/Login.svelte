<script>
    import { Inertia } from "@inertiajs/inertia";
    import { inertia, useForm } from "@inertiajs/inertia-svelte";
    import AvatarLinksStore from "../admin/layout/AvatarLinksStore";

    //
    useForm;
    let loginInfo = useForm({ email: "test@example.com", password: "123" });

    let errorList = [];

    // fun
    $: {
        errorList = Object.values($loginInfo.errors);
        // console.log("errorList", errorList);

        // console.log("loginInfo", $loginInfo);
    }

    let handelSubmit = () => {
        $loginInfo.post("/auth/login", loginInfo);
    };
</script>

<!-- svelte-ignore a11y-label-has-associated-control -->

<main
    class="bg-gray-50 flex flex-col   justify-center items-center gap-10  h-screen "
>
    <!--  -->
    <h1 class="text-5xl font-bold  capitalize">login</h1>
    <div class="border border-primary rounded-md  w-max  bg-white">
        <form
            action="/auth/login"
            method="post"
            on:submit|preventDefault={handelSubmit}
            class="flex flex-col gap-10 items-center px-20 py-10"
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
                    class="input w-full input-primary shadow-lg shadow-success"
                    bind:value={$loginInfo.email}
                />
            </div>

            <!-- password -->
            <div class=" w-full max-w-xs ">
                <label class="label">
                    <span class="label-text capitalize">password </span>
                </label>
                <input
                    type="password"
                    placeholder="Type here"
                    name="password"
                    class="input w-full  input-primary shadow-lg shadow-success"
                    bind:value={$loginInfo.password}
                />
            </div>

            <!-- errors -->
            {#if errorList.length != 0}
                <div class="alert-error p-3 rounded-lg">
                    {#each errorList as error}
                        <p>&blacktriangleright; {error}</p>
                    {/each}
                </div>
            {/if}

            <button
                class=" btn btn-primary shadow-2xl shadow-current "
                class:loading={$loginInfo.processing}
            >
                login
            </button>
        </form>
    </div>
</main>
