<script>
    //
    export var id = "delete";
    export var headerText = "This item will be deleted";
    export var detailsText = "";
    export var callback = () => {};

    var deleteBtnClk = false;
</script>

<main>
    <input type="checkbox" {id} class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <label for={id} class="modal cursor-pointer" />
        <div class="modal-box">
            <label
                for={id}
                class="btn btn-sm  btn-circle btn-outline absolute right-2 top-2"
                >✕</label
            >
            <label for={id} class="modal cursor-pointer" />
            <h3 class="font-bold text-xl text-red-700">
                {headerText}
            </h3>
            <p class="py-4">
                {detailsText}
            </p>
            <div class="modal-action">
                <label for={id} class="btn btn-ghost">cancel</label>
                <label
                    on:click={() => {
                        deleteBtnClk = true;
                        callback();
                        deleteBtnClk = !deleteBtnClk;
                    }}
                    class:loading={deleteBtnClk}
                    for={id}
                    class="btn btn-error ">Delete</label
                >
            </div>
        </div>
    </div>
</main>
