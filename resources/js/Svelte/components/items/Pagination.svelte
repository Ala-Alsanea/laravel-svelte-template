<script>
    //
    import { inertia, page, Link } from "@inertiajs/inertia-svelte";

    export let links;
</script>

<main>
    <div class=" text-center">
        <div class="btn-group ">
            {#each links as link}
                <a
                    class="btn btn-outline"
                    class:btn-active={link.active}
                    class:btn-disabled={!link.url}
                    href={link.url}
                    use:inertia
                >
                    {@html link.label}
                </a>
            {/each}
        </div>
    </div>
</main>
