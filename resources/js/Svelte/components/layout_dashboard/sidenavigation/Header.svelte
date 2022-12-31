<script>
    export let userInfo = { rule: "admin", username: "dora" };
</script>

<div
    class="flex flex-col gap-3 p-4 m-2 items-center justify-center   sticky text-white text-2xl font-semibolds top-0 hover:bg-primary-focus rounded-md capitalize"
>
    <h1>
        {userInfo.rule}
    </h1>
    <h2 class="text-base">
        <!-- {userInfo.username} -->
    </h2>
</div>
