<script>
    //
    export let alerts = null;
</script>

<main>
    {#if alerts}
        <div
            class="alert shadow-lg alert- my-2 flex "
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
</main>
