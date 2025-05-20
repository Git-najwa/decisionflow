import { createRouter, createWebHistory } from 'vue-router';
import LoginForm from '@/components/LoginForm.vue';
import Scenarios from '@/components/Scenarios.vue';
import Step from '@/components/Step.vue';

const routes = [
  {
    path: '/',
    redirect: '/scenarios',
  },
  {
    path: '/login',
    component: LoginForm,
  },
  {
    path: '/scenarios',
    component: Scenarios,
    beforeEnter: () => {
      return localStorage.getItem('token') ? true : '/login';
    },
  },
  {
    path: '/scenarios/:id/step/:stepId',
    name: 'step',
    component: Step,
    props: true,
    beforeEnter: () => {
      return localStorage.getItem('token') ? true : '/login';
    },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
