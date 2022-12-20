<!-- svelte-ignore a11y-label-has-associated-control -->
<script context="module">
    import Layout from "./layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { Inertia } from "@inertiajs/inertia";

    let data = {
        model: null,
        brand: "",
        color: "",
        price: null,
        year: null,
        description: null,
    };

    export let brands;
    let brandSelected;
    let brandDefault = "Pick one";

    export let colors;
    let colorSelected;
    let colorDefault = "Pick one";

    export let errors;
    let errorList = [];

    // fun

    function handelSubmit() {
        console.log("post", data);
        Inertia.post("/create/store", data);
    }

    $: {
        data.brand = brandSelected;
        data.color = colorSelected;
    }
    $: {
        errorList = Object.values(errors);
        console.log("errorList", errorList);
    }
    $: console.log("errors", errors);
    $: console.log("data", data);
</script>

<main>
    <div class="border border-primary rounded-md p-5 mx-10 ">
        <form
            action=""
            on:submit|preventDefault={handelSubmit}
            class="flex flex-col gap-3 "
        >
            <!-- model -->
            <div class=" w-full max-w-xs">
                <label class="label">
                    <span class="label-text">What is the model ?</span>
                </label>
                <input
                    type="text"
                    placeholder="Type here"
                    name="model"
                    class="input w-full  input-primary"
                    required
                    bind:value={data.model}
                />
            </div>

            <!-- color & color -->
            <div class=" flex gap-2 flex-wrap">
                <!-- brand -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">brand</span>
                    </label>
                    <select
                        name="brand"
                        class="select  select-primary"
                        required
                        bind:value={data.brand}
                    >
                        <option disabled selected>{brandDefault}</option>
                        {#each brands as brand}
                            <option>{brand.data}</option>
                        {/each}
                    </select>
                </div>

                <!-- color -->
                <div class="form-control w-full max-w-lg">
                    <label class="label">
                        <span class="label-text">color</span>
                    </label>
                    <select
                        name="color"
                        class="select select-primary"
                        required
                        bind:value={data.color}
                    >
                        <option disabled selected>{colorDefault}</option>
                        {#each colors as color}
                            <option>{color.data}</option>
                        {/each}
                    </select>
                </div>
            </div>

            <!-- price & year -->
            <div class=" flex gap-2 flex-wrap">
                <!-- price -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">price</span>
                    </label>
                    <input
                        type="number"
                        placeholder="Type here $$$"
                        name="price"
                        class="input w-full max-w-xs input-primary inline-flex"
                        required
                        bind:value={data.price}
                    />
                </div>

                <!-- year -->
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">year</span>
                    </label>
                    <input
                        type="date"
                        placeholder="Type here"
                        name="year"
                        class="input  w-full max-w-xs input-primary"
                        required
                        bind:value={data.year}
                    />
                </div>
            </div>

            <!-- description -->
            <div class=" w-full max-w-xs">
                <label class="label">
                    <span class="label-text">description </span>
                </label>
                <textarea
                    name="description"
                    class="textarea textarea-primary  "
                    placeholder="description"
                    required
                    bind:value={data.description}
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

            <button class=" btn btn-success md:w-20"> submit</button>
        </form>
    </div>
</main>

<svelte:head>
    <title>create</title>
</svelte:head>
