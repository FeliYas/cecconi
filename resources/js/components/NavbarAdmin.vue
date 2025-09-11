<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount, computed } from 'vue';
import { usePage, router } from '@inertiajs/vue3';

const props = defineProps({
  userName: { type: String, default: 'Usuario' },
  userEmail: { type: String, default: 'usuario@example.com' },
  title: { type: String, default: 'Panel de Administración' }
});
const emit = defineEmits(['toggle-sidebar']);

const isUserMenuOpen = ref(false);
const userSubmenu = ref<HTMLElement | null>(null);
const userMenuButton = ref<HTMLElement | null>(null);

const page = usePage();
const displayName = computed(() => {
  return (page.props as any).auth?.user?.name
    ? ((page.props as any).auth.user.name.charAt(0).toUpperCase() + (page.props as any).auth.user.name.slice(1))
    : props.userName;
});
const displayEmail = computed(() => {
  return (page.props as any).auth?.user?.email || props.userEmail;
});

const homeHref = computed(() => {
  return (window as any).route ? (window as any).route('home') : '/';
});

function toggleSidebar() {
  emit('toggle-sidebar');
}

function toggleUserMenu() {
  isUserMenuOpen.value = !isUserMenuOpen.value;
}

function logout() {
  router.post((window as any).route('logout'));
}

function handleClickOutside(event: Event) {
  const target = event.target as Node;
  if (
    isUserMenuOpen.value &&
    userSubmenu.value &&
    !userSubmenu.value.contains(target) &&
    userMenuButton.value &&
    !userMenuButton.value.contains(target)
  ) {
    isUserMenuOpen.value = false;
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
  console.log(page.props);
});

onBeforeUnmount(() => {
  document.removeEventListener('click', handleClickOutside);
});
</script>
<template>
  <div class="bg-gray-100 shadow-md flex justify-between items-center z-50 transition-all duration-300 hover:shadow-xl"
    style="height: 64px; padding: 0 2rem; border-bottom: 1px solid rgba(13, 129, 65, 0.1);">
    <div class="flex items-center">
      <button @click="toggleSidebar"
        class="text-gray-600 hover:text-gray-900 mr-3 cursor-pointer transition-all duration-200">
        <i class="fa-solid fa-bars"></i>
      </button>
      <h1 class="lg:text-lg font-semibold text-main-color">{{ title }}</h1>
    </div>
    <div class="relative">
      <button class="flex items-center gap-2 rounded-full hover:bg-gray-100 transition-all duration-200"
        @click="toggleUserMenu" ref="userMenuButton">
        <span class="hidden sm:block text-gray-700 font-medium">{{ displayName }}</span>
        <i class="fa-sharp fa-solid fa-circle-user fa-xl transition-transform duration-300 text-main-color cursor-pointer"
          :class="{ 'rotate-180': isUserMenuOpen }"></i>
      </button>
      <div
        class="absolute right-0 mt-2 bg-white rounded-lg shadow-xl min-w-[220px] overflow-hidden z-[100] transition-all duration-300"
        :class="isUserMenuOpen ? 'opacity-100 visible translate-y-0' : 'opacity-0 invisible translate-y-2'"
        ref="userSubmenu">
        <div class="px-6 py-4 bg-main-color text-white">
          <p class="font-medium">{{ displayName }}</p>
          <p class="text-xs opacity-75 truncate">{{ displayEmail }}</p>
        </div>
        <div class="py-2">
          <a :href="homeHref"
            class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200 transition-colors duration-200">
            <i class="fa-solid fa-home mr-3 text-main-color"></i>
            <span>Ir al inicio</span>
          </a>
          <button @click="logout"
            class="flex items-center w-full px-6 py-3 text-gray-700 hover:bg-gray-200 transition-colors duration-200">
            <i class="fa-solid fa-right-from-bracket mr-3 text-main-color"></i>
            <span>Cerrar Sesión</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>