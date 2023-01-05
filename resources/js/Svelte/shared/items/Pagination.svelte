<script>
    import { Inertia } from "@inertiajs/inertia";

    //
    import { inertia, page, Link } from "@inertiajs/inertia-svelte";

    export let current_path;
    export let links;
    export let per_page = 10;
    export let nums = [10, 50, 100];

    $: {
        // console.log(current_path);
        // Inertia.get(current_path, { per_page: per_page });
        // Inertia.get();
    }
</script>

<main>
    <div class="flex gap-5 justify-evenly items-center">
        <div class="form-control flex gap-1  max-w-xs pb-2">
            <select
                name="per_page"
                class="select select-primary inline"
                required
                bind:value={per_page}
            >
                <option disabled selected>{per_page}</option>
                {#each nums as num}
                    <option
                        on:click={() => {
                            Inertia.get(current_path, { per_page: per_page });
                        }}>{num}</option
                    >
                {/each}
            </select>
        </div>

        <div class=" text-center">
            <div class="btn-group ">
                {#each links as link}
                    <a
                        class="btn btn-outline"
                        class:btn-active={link.active}
                        class:btn-disabled={!link.url}
                        href={link.url + "&per_page=" + per_page}
                        use:inertia
                    >
                        {@html link.label}
                    </a>
                {/each}
            </div>
        </div>
    </div>
</main>
