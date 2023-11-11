<script>
    import { Inertia } from "@inertiajs/inertia";
    import { inertia, page } from "@inertiajs/inertia-svelte";
    import { empty, is_empty } from "svelte/internal";
    import Alert from "./Alert.svelte";
    import DeleteModal from "./DeleteModal.svelte";
    import Pagination from "./Pagination.svelte";

    export let resources;
    export let alerts;
    export let tableName = "table name";
    export let colNames = [];
    export let per_page = 10;
    export let nums = [10, 50, 100];
    // export let can;

    let dataList;
    let CreateBtnClk = false;

    $: {
        // dataList = Object.keys(resources.data[0]);
        // dataList = dataList.filter((value) => {
        //     return "_id" != value.slice(-3);
        // });
        if (is_empty(resources.data)) {
            Inertia.get(
                resources.last_page_url + "&per_page=" + resources.per_page
            );
        }
    }

    export let handleDelete = (id) => {
        console.log("/cars/" + id);
        Inertia.delete("/cars/" + id);
    };

    export let handleUpdate = (id) => {
        console.log("/cars/" + id + "/edit");
        Inertia.get("/cars/" + id + "/edit");
    };

    export let handleCerate = () => {
        CreateBtnClk = !CreateBtnClk;
        console.log("/cars/create");
        Inertia.get("/cars/create");
    };
</script>

<main>
    <!--  -->
    <div class="overflow-x-auto px-3 flex flex-col gap-5 ">
        <!--  -->
        <div class="flex justify-between items-center mx-10 ">
            <h1 class="text-3xl font-semibold capitalize ">
                {tableName}
            </h1>

            <!-- {#if can.create} -->
            <label
                for="cerate"
                use:inertia
                class="btn btn-primary text-white text-lg py-0 md:btn-wide "
                class:loading={CreateBtnClk}
                on:click={() => {
                    handleCerate();
                }}
            >
                add +
            </label>
            <!-- {/if} -->
        </div>
        {#if resources.total > 0}
            <Alert {alerts} />
            <!-- Pagination -->
            <Pagination
                bind:per_page
                bind:nums
                links={resources.links}
                current_path={resources.path +
                    "?page=" +
                    resources.current_page}
            />
            <!--  -->
            <table
                class="table table-zebra w-full"
                class:table-compact={per_page == 100}
            >
                <!-- head -->
                <thead>
                    <tr>
                        {#each colNames as colName}
                            <th>{colName}</th>
                        {/each}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {#each resources.data as data, i (data.id)}
                        <!-- row 1 -->
                        <tr class="hover">
                            <th>{i + 1}</th>
                            <td>{data.id}</td>
                            <td>{data.model}</td>
                            <td>{data.brand.data}</td>
                            <td>{data.color.data}</td>
                            <!-- BTNs -->
                            <td>
                                <label
                                    for="update"
                                    use:inertia
                                    class="btn btn-info py-0"
                                    on:click={() => {
                                        handleUpdate(data.id);
                                    }}
                                >
                                    Update
                                </label>

                                <!-- {#if $page.props.can.delete} -->
                                <label
                                    for="delete-{data.id}"
                                    class="btn btn-error py-0"
                                >
                                    Delete
                                </label>
                                <!-- {/if} -->
                            </td>
                        </tr>
                        <DeleteModal
                            detailsText="the {data.model} will be preeminently deleted"
                            id="delete-{data.id}"
                            callback={() => {
                                handleDelete(data.id);
                            }}
                        />
                    {/each}
                </tbody>
                <tfoot>
                    <tr>
                        {#each colNames as colName}
                            <th>{colName}</th>
                        {/each}
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

            <Alert {alerts} />

            <!-- Pagination -->
            <Pagination
                bind:per_page
                bind:nums
                links={resources.links}
                current_path={resources.path +
                    "?page=" +
                    resources.current_page}
            />
            <!--  -->
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
</main>
