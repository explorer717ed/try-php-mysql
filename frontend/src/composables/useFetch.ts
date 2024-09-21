export const useFetch = () => {
  const baseUrl = "http://localhost:8080/api"

  const post = async (url: string, data?: any) => {
    const response = await fetch(baseUrl + url, {
      method: 'post',
      body: JSON.stringify(data)
    })
    return await response.json()
  }

  return { post }
}