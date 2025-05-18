import { createRouter, createWebHistory } from 'vue-router'
import Scenarios from '@/components/Scenarios.vue'
import Step from '@/components/Step.vue'

const routes = [
  {
    path: '/',
    redirect: '/scenarios'
  },
  {
    path: '/scenarios',
    component: Scenarios
  },
  {
    path: '/scenarios/:id/step/:stepId',
    name: 'step',
    component: Step,
    props: true
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
