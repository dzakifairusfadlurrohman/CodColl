export async function usePosts() {
    const { data } = await useFetch('http://localhost:8000/api/posts')
    return data.value || []
  }
  

  export async function usePost(slug) {
    const { data } = await useFetch(`http://127.0.0.1:8000/api/posts/${slug}`)
    return data
  }