<template>
    <router-view/>
</template>

<script>
export default {
    name: "App"
}
</script>

<style>

:root {
    --primary-blue: #3092FD;
}

@font-face {
    font-family: Inter-Regular;
    src: url("/assets/fonts/Inter-Regular.ttf");
}

@font-face {
    font-family: Inter-Medium;
    src: url("/assets/fonts/Inter-Medium.ttf");
}

@font-face {
    font-family: Inter-Semibold;
    src: url("/assets/fonts/Inter-Semibold.ttf");
}

html, body {
    padding: 0;
    margin: 0;
    text-decoration: none;
    font-family: sans-serif, Arial, "Droid Sans", "Segoe UI", Inter;
}

</style>
