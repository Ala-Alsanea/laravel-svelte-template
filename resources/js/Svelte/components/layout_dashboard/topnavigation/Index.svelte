<script>
    import { open } from "../provider/store";

    const toggle = () => {
        $open = !$open;
    };
</script>

<header
    class="bg-primary h-20 items-center relative z-10 border-b-2 border-b-base-content"
>
    <div
        class="flex flex-center flex-col h-full justify-center mx-auto px-3 relative"
    >
        <div
            class="flex items-center pl-1 relative w-full sm:pr-2 sm:ml-0 lg:max-w-68"
        >
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
        </div>
    </div>
</header>
