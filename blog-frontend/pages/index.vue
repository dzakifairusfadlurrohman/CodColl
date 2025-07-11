<template>
    <section class="min-h-screen bg-gradient-to-br from-gray-100 to-white py-12">
      <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">
          ✨ Blog Highlights
        </h1>
  
        <!-- Search and Filter -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Cari judul post..."
            class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
          />
  
          <select
            v-model="selectedCategory"
            class="w-full md:w-1/4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
          >
            <option value="">Semua Kategori</option>
            <option v-for="category in categories" :key="category">{{ category }}</option>
          </select>
        </div>
  
        <!-- Loading State -->
        <div v-if="pending" class="text-center py-10 text-gray-500">
          Memuat postingan...
        </div>
  
        <!-- Post Cards -->
        <div v-else-if="filteredPosts.length" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div
            v-for="post in paginatedPosts"
            :key="post.slug"
            class="bg-white shadow-md rounded-2xl overflow-hidden transition transform hover:-translate-y-1 hover:shadow-lg"
          >
            <div class="p-6">
              <NuxtLink
                :to="`/posts/${post.slug}`"
                class="text-2xl font-semibold text-blue-700 hover:text-blue-900 transition duration-200 hover:underline"
              >
                {{ post.title }}
              </NuxtLink>
              <p class="mt-4 text-gray-700 text-sm leading-relaxed">
                {{ (post.content || '').replace(/<[^>]+>/g, '').slice(0, 120) }}...
              </p>
              <NuxtLink
                :to="`/posts/${post.slug}`"
                class="inline-block mt-4 text-sm text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition"
              >
                Baca Selengkapnya
              </NuxtLink>
            </div>
          </div>
        </div>
  
        <!-- No Results -->
        <div v-else class="text-center text-gray-500 mt-10">
          Tidak ada post yang sesuai dengan pencarian atau filter.
        </div>
  
        <!-- Pagination -->
        <div v-if="filteredPosts.length" class="mt-10 flex justify-center items-center gap-4">
          <button
            @click="currentPage--"
            :disabled="currentPage === 1"
            class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 disabled:opacity-50"
          >
            Sebelumnya
          </button>
          <span>Halaman {{ currentPage }} / {{ totalPages }}</span>
          <button
            @click="currentPage++"
            :disabled="currentPage === totalPages"
            class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 disabled:opacity-50"
          >
            Selanjutnya
          </button>
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  const { data: posts, pending, error } = await useFetch('http://localhost:8000/api/posts')
  
  const searchQuery = ref('')
  const selectedCategory = ref('')
  const currentPage = ref(1)
  const perPage = 6
  
  const categories = computed(() => {
    const all = posts.value?.data?.map(p => p.category).filter(Boolean) || []
    return [...new Set(all)]
  })
  
  const filteredPosts = computed(() => {
    let result = posts.value?.data || []
    if (searchQuery.value) {
      result = result.filter(p => p.title.toLowerCase().includes(searchQuery.value.toLowerCase()))
    }
    if (selectedCategory.value) {
      result = result.filter(p => p.category === selectedCategory.value)
    }
    return result
  })
  
  const totalPages = computed(() => Math.ceil(filteredPosts.value.length / perPage))
  const paginatedPosts = computed(() => {
    const start = (currentPage.value - 1) * perPage
    return filteredPosts.value.slice(start, start + perPage)
  })
  </script>
  