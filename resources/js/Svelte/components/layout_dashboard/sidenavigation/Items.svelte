<script>
    import data from "./data";
    import { page, inertia } from "@inertiajs/inertia-svelte";

    export let DataItem = data;

    const style = {
        title: `mx-4 text-sm`,
        section: ` pl-5 text-white text-center mb-6 uppercase lg:pl-1`,
        active: `border-l-4 border-white `,
        link: `flex items-center text-gray-200 justify-start my-2 p-3 w-full hover:text-white hover:bg-primary-focus`,
    };
</script>

<ul class="md:pl-2 md:pr-3 ">
    <li>
        {#each DataItem as section, i (section.section)}
            <div class="mb-12">
                <div class={style.section}>{section.section}</div>

                {#each section.content as item, i (item.title)}
                    <button
                        use:inertia={{ href: item.link }}
                        class={`${style.link} ${
                            item.link === $page.url ||
                            item.component === $page.component
                                ? style.active
                                : ""
                        }`}
                    >
                        <span><svelte:component this={item.icon} /></span>
                        <span class={style.title}>{item.title}</span>
                    </button>
                {/each}
            </div>
        {/each}
    </li>
</ul>
