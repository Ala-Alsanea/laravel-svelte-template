<script>
    import data from "./data";
    import { page, inertia } from "@inertiajs/inertia-svelte";

    export let SideLinks = data;

    const style = {
        title: `ml-2 text-sm`,
        section: `text-white text-left text-lg  w-full capitalize collapse-title`,
        active: `border-none font-bold bg-neutral-focus text-white`,
        link: `flex items-center text-gray-200 justify-start my-2 p-3 w-full h-full text-xs  btn btn-ghost hover:bg-white hover:text-black `,
    };
</script>

<ul class="md:pl-2 md:pr-3 ">
    <li>
        {#each SideLinks as section, i (section.section)}
            <div
                class="mb-3 collapse collapse-arrow  bg-primary-focus mx-2 md:mx-0 rounded-lg"
            >
                <input type="checkbox" name="" id="" />
                <label for={i} class={style.section}>
                    {section.section}
                </label>

                <div class="collapse-content ">
                    <div class="">
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
                                <span
                                    ><svelte:component this={item.icon} /></span
                                >
                                <span class={style.title}>{item.title}</span>
                            </button>
                        {/each}
                    </div>
                </div>
            </div>
        {/each}
    </li>
</ul>
