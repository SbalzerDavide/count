<template>
    <div class="home-vue">
        <h1>pagina home con percorso '/' gestita da Vue</h1>
        <router-link :to="{name:'folders'}">Visualizza tutte le tue cartelle</router-link>
    </div>
</template>

<script>

    export default {
        name: "HomeVue",
    }
</script>