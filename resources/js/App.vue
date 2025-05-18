<script setup>
  import { ref } from 'vue';
  import TheHeader from '@/components/TheHeader.vue';
  import PageExample from '@/pages/PageExample.vue';
  import FetchTest from './components/FetchTest.vue';
  import ScenarioTest from './components/ScenarioTest.vue';
  const n = ref(1);
</script>

<template>
  <div>
    <TheHeader />
    <main>
      
      <FetchTest />
      <ScenarioTest />

    </main>
  </div>
</template>

<style scoped>

</style>