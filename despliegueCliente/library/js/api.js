export async function apiRequest(url, data = null) {
  const options = data
    ? {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
      }
    : {};

  const response = await fetch(url, options);
  return response.json();
}
