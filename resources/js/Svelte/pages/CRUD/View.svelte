<script context="module">
    import Layout from "./layout/_layout.svelte";
    export let layout = Layout;
</script>

<script>
    import { inertia, page } from "@inertiajs/inertia-svelte";
    // import Icon from "@iconify/svelte";
    import { Inertia } from "@inertiajs/inertia";
    import DeleteModal from "../../components/items/DeleteModal.svelte";
    import Pagination from "../../components/items/Pagination.svelte";

    export let cars;
    export let alerts;
    let counter = 0;

    function handleDelete(id) {
        console.log("/delete/" + id);
        Inertia.delete("/delete/" + id);
    }

    $: console.log("cars", cars);
</script>

<main>
    <!-- <Icon heigh="10" icon="mdi-light:alarm-plus" /> -->
    <!--  -->
    <div class="overflow-x-auto px-3 flex flex-col gap-5">
        {#if cars.total > 0}
            {#if alerts}
                <div
                    class="alert shadow-lg alert- my-5 flex "
                    class:alert-success={alerts.success}
                    class:alert-info={alerts.info}
                    class:alert-warning={alerts.warning}
                    class:alert-error={alerts.error}
                >
                    <div>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="stroke-current flex-shrink-0 h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            ><path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            /></svg
                        >

                        <span>{alerts.msg}</span>
                    </div>
                    <button
                        on:click={() => {
                            alerts = null;
                        }}
                        class="btn btn-sm btn-circle btn-outline ">✕</button
                    >
                </div>
            {/if}
            <table class="table table-zebra w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Favorite Color</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {#each cars.data as car}
                        <!-- row 1 -->
                        <tr>
                            <th>{car.id}</th>
                            <td>{car.model}</td>
                            <td>{car.brand.data}</td>
                            <td>{car.color.data}</td>
                            <!-- BTNs -->
                            <td>
                                <button
                                    use:inertia={{ href: "/edit/" + car.id }}
                                    class="btn btn-primary py-0"
                                >
                                    Update
                                </button>

                                <label
                                    on:click={() => {
                                        console.log("delete");
                                    }}
                                    for="delete-{car.id}"
                                    class="btn btn-error py-0 "
                                >
                                    Delete
                                </label>
                            </td>
                        </tr>
                        <DeleteModal
                            id="delete-{car.id}"
                            callback={() => {
                                handleDelete(car.id);
                            }}
                        />
                    {/each}
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Favorite Color</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

            <!-- Pagination -->
            <Pagination links={cars.links} />
        {:else}
            <div class="flex justify-center items-center">
                <div class="card w-96 bg-primary text-white">
                    <div class="card-body">
                        <h2 class=" font-bold text-4xl text-center">
                            No Data Found
                        </h2>
                    </div>
                </div>
            </div>
        {/if}
    </div>

    <div class="">
        <!-- <svelte: this={cars.links[0].label} /> -->
        <!-- {@html cars.links[0].label} -->
    </div>
</main>

<svelte:head>
    <title>View</title>
</svelte:head>

<style>
</style>
