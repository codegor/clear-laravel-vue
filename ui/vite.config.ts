import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue2'
import basicSsl from '@vitejs/plugin-basic-ssl'

// https://vitejs.dev/config/
export default defineConfig({
  resolve: { alias: { '@': '/src' } },
  plugins: [vue(), basicSsl()],
  server: {
    host: true,
    port: 8080
  },
})
