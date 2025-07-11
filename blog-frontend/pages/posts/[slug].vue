<template>
    <div class="max-w-3xl mx-auto py-10 px-4">
      <NuxtLink to="/" class="text-blue-500 text-sm hover:underline mb-4 inline-block">
        ← Kembali ke Beranda
      </NuxtLink>
  
      <div v-if="post">
        <h1 class="text-3xl font-bold mb-4">{{ post.title }}</h1>
        <div class="text-gray-500 text-sm mb-6">
          {{ formatDate(post.created_at) }}
        </div>
        <div v-html="post.content" class="prose max-w-none"></div>
      </div>
  
      <div v-else>
        <p>Post tidak ditemukan.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { useRoute } from 'vue-router'
  
  const route = useRoute()
  const { data: post } = await useFetch(`http://localhost:8000/api/posts/${route.params.slug}`)
  
  function formatDate(dateString) {
    return new Date(dateString).toLocaleDateString('id-ID', {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
    })
  }
  </script>
  