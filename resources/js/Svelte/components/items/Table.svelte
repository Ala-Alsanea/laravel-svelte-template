<script>
    import { Inertia } from "@inertiajs/inertia";
    import { inertia } from "@inertiajs/inertia-svelte";
    import Alert from "./Alert.svelte";
    import DeleteModal from "./DeleteModal.svelte";
    import Pagination from "./Pagination.svelte";

    export let resources;
    export let alerts;
    export let tableName = "table name";
    export let colNames = [];
    let dataList;
    let CreateBtnClk = false;

    $: {
        dataList = Object.values(resources.data);
        console.log(dataList);
    }

    export let handleDelete = (id) => {
        console.log("/delete/" + id);
        Inertia.delete("/delete/" + id);
    };

    export let handleUpdate = (id) => {
        console.log("/edit/" + id);
        Inertia.get("/edit/" + id);
    };

    export let handleCerate = () => {
        CreateBtnClk = !CreateBtnClk;
        console.log("/create");
        Inertia.get("/create");
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
        </div>
        {#if resources.total > 0}
            <Alert {alerts} />

            <table class="table table-compact w-full">
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

                                <label
                                    for="delete-{data.id}"
                                    class="btn btn-error py-0"
                                >
                                    Delete
                                </label>
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
                    </tr>
                </tfoot>
            </table>

            <!-- Pagination -->
            <Pagination links={resources.links} />
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
