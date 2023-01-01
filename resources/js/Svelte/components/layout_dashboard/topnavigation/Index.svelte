<!-- svelte-ignore a11y-missing-attribute -->
<script>
    import { inertia } from "@inertiajs/inertia-svelte";
    import { open } from "../provider/store";

    let username = "aa";
    export let AvatarLinks = [
        {
            title: "profile",
            link: "/cars/create",
        },
        {
            title: "Settings",
            link: "/cars",
        },
        {
            title: "logout",
            link: "/cars",
        },
    ];

    const toggle = () => {
        $open = !$open;
    };
</script>

<!-- svelte-ignore a11y-no-noninteractive-tabindex -->

<header
    class="bg-primary h-20 items-center relative z-10 border-b-base-content"
>
    <div
        class="flex flex-center flex-col h-full  justify-center mx-auto px-3 relative"
    >
        <div
            class="flex gap-4 items-center pl-1 relative w-full sm:pr-2 sm:ml-0 lg:max-w-68
             "
        >
            <!--  -->
            <div class="container flex left-0 relative w-3/4">
                <div class="flex group h-full items-center relative w-12">
                    <button
                        type="button"
                        aria-expanded="false"
                        aria-label="Toggle sidenav"
                        on:click={toggle}
                        class="text-4xl text-white focus:outline-none lg:hidden"
                    >
                        &#8801;
                    </button>
                </div>
            </div>
            <!-- search -->
            <form on:submit|preventDefault class="form-control">
                <div class="input-group">
                    <input
                        type="text"
                        placeholder="Search…"
                        class="input input-bordered"
                    />
                    <button
                        class="btn btn-square bg-neutral-focus text-white hover:bg-white hover:text-black"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            ><path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            /></svg
                        >
                    </button>
                </div>
            </form>
            <!-- avatar -->
            <!-- <div class="avatar placeholder">
                <div
                    class="bg-neutral-focus text-neutral-content rounded-full w-12"
                >
                    <span>MX</span>
                </div>
            </div> -->

            <!--  -->

            <div class="dropdown dropdown-end">
                <label
                    for="avatar"
                    tabindex="0"
                    class="btn btn-ghost btn-circle avatar capitalize"
                >
                    <div class="avatar placeholder">
                        <div
                            class="bg-neutral-focus text-white hover:bg-white hover:text-black rounded-full w-11"
                        >
                            <span>{username}</span>
                        </div>
                    </div>
                </label>

                <ul
                    tabindex="0"
                    class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52 border border-primary border-separate"
                >
                    {#each AvatarLinks as AvatarLink}
                        <li>
                            <button
                                class="capitalize"
                                use:inertia={{ href: AvatarLink.link }}
                            >
                                {AvatarLink.title}
                            </button>
                        </li>
                    {/each}
                </ul>
            </div>
        </div>
    </div>
</header>
