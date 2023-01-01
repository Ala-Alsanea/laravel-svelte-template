<!-- svelte-ignore a11y-label-has-associated-control -->
<script context="module">
    import Layout from "./layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { Inertia } from "@inertiajs/inertia";
    import { inertia } from "@inertiajs/inertia-svelte";
    import Alert from "../../components/items/Alert.svelte";

    export let alerts;
    export let car;
    export let brands;
    export let colors;
    export let errors;
    let errorList = [];

    // fun

    function handelSubmit(id) {
        console.log("put", "cars/" + id);
        Inertia.put("/cars/" + id, car);
    }
    $: {
        errorList = Object.values(errors);
    }
</script>

<main>
    <!-- <Alert {alerts} /> -->

    <h1 class="text-5xl font-bold mb-9 ml-8">Update No. {car.id}</h1>

    <div class="border border-primary rounded-md p-5 mx-10 ">
        <form
            method="post"
            action=""
            on:submit|preventDefault={() => {
                handelSubmit(car.id);
            }}
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
                    bind:value={car.model}
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
                        bind:value={car.brand}
                    >
                        <option disabled selected>{car.brand}</option>
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
                        bind:value={car.color}
                    >
                        <option disabled selected>{car.color}</option>
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
                        bind:value={car.price}
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
                        bind:value={car.year}
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
                    bind:value={car.description}
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
            <Alert {alerts} />

            <div class="btn-group flex justify-center mt-10">
                <a href="/cars" use:inertia class=" btn  btn-outline md:w-20">
                    go back</a
                >
                <button class=" btn btn-success  md:w-20"> submit</button>
            </div>
        </form>
    </div>
</main>

<svelte:head>
    <title>update</title>
</svelte:head>
