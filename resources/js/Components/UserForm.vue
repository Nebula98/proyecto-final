<template>
  <form @submit.prevent="submit" class="space-y-4">
    <div>
      <label class="block font-medium">Nombre</label>
      <input v-model="form.name" type="text" class="w-full border rounded px-3 py-2" />
      <span v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</span>
    </div>

    <div>
      <label class="block font-medium">Email</label>
      <input v-model="form.email" type="email" class="w-full border rounded px-3 py-2" />
      <span v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email }}</span>
    </div>

    <div>
      <label class="block font-medium">Rol</label>
      <select v-model="form.role" class="w-full border rounded px-3 py-2">
        <option value="admin">Administrador</option>
        <option value="coordinador">Coordinador</option>
        <option value="vicerrector">Vicerrector</option>
      </select>
      <span v-if="form.errors.role" class="text-red-500 text-sm">{{ form.errors.role }}</span>
    </div>

    <div>
      <label class="block font-medium">Contraseña</label>
      <input v-model="form.password" type="password" class="w-full border rounded px-3 py-2" />
      <span v-if="form.errors.password" class="text-red-500 text-sm">{{ form.errors.password }}</span>
    </div>

    <div>
      <label class="block font-medium">Confirmar Contraseña</label>
      <input v-model="form.password_confirmation" type="password" class="w-full border rounded px-3 py-2" />
    </div>

    <div>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Guardar
      </button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  email: '',
  role: 'admin',
  password: '',
  password_confirmation: '',
});

function submit() {
  form.post(route('users.store'), {
    preserveScroll: true,
    onSuccess: () => form.reset('password', 'password_confirmation'),
  });
}
</script>