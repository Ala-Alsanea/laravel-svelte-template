<script>
    import { open } from "../provider/store";
    import SidenavItems from "./Items.svelte";
    import SidenavHeader from "./Header.svelte";
    import { clickOutside } from "../provider/click-outside";
    import { page } from "@inertiajs/inertia-svelte";

    export let SideLinks;
    export let mobilePosition = "right";

    const style = {
        mobilePosition: {
            left: "left-0",
            right: "right-0",
        },
        close: `hidden`,
        container: `pb-32 lg:pb-6 bg-primary-focus flex flex-col gap-10`,
        open: `w-8/12 absolute z-40 sm:w-5/12`,
        default: `bg-primary-focus  h-screen overflow-y-auto top-0 lg:block lg:relative lg:w-64 lg:z-auto`,
    };

    const closeSidenav = () => {
        //close sidenav on click outside when viewport is less than 1024px
        if (window.innerWidth < 1024) {
            $open = false;
        }
    };
</script>

<aside
    use:clickOutside
    on:click_outside={closeSidenav}
    class={`${style.default} ${style.mobilePosition[mobilePosition]}
       ${$open ? style.open : style.close} scrollbar `}
>
    <section class="flex flex-col justify-between h-full ">
        <div class={style.container}>
            <!-- <div class="border-r-2 border-r-base-content   "> -->
            <SidenavHeader />
            <SidenavItems {SideLinks} />
            <!-- </div> -->
        </div>

        <div
            class="text-white text-sm text-center bg-primary m-2 mx-5 py-1
             rounded-full"
        >
            copyrights &copy; {$page.props.copyrightData}
        </div>
    </section>
</aside>

<style>
    .scrollbar::-webkit-scrollbar {
        width: 0;
        background: transparent; /* hide sidenav scrollbar on Chrome, Opera and other webkit Browsers*/
    }
    .scrollbar {
        -ms-overflow-style: none;
    }
</style>
