<script context="module">
    import Layout from "./layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    export let cars;
    let counter = 0;

    $: console.log("cars", cars.data[0]);
</script>

<main>
    <!--  -->
    <div class="overflow-x-auto px-3">
        <table class="table table-zebra w-full">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Favorite Color</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {#each cars.data as car}
                    <!-- row 1 -->
                    <tr>
                        <th>{(counter = counter + 1)}</th>
                        <td>{car.brand.data}</td>
                        <td>{car.model}</td>
                        <td>{car.color.data}</td>
                        <!-- BTNs -->
                        <td>
                            <button class="btn btn-primary py-0">
                                Update
                            </button>

                            <button class="btn btn-error py-0"> Delete </button>
                        </td>
                    </tr>
                {/each}
            </tbody>
        </table>
    </div>
</main>

<svelte:head>
    <title>View</title>
</svelte:head>

<style>
</style>
