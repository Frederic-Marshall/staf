import axios from 'axios'

const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

api.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');

    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
}, (error) => {
    return Promise.reject(error);
});

export default {
    get(url, config = {}) {
        return api.get(url, config);
    },
    post(url, config = {}) {
        return api.post(url, config);
    },
    put(url, config = {}) {
        return api.put(url, config);
    },
    delete(url, config = {}) {
        return api.delete(url, config);
    },
    setHeader(token) {
        axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    },
}
