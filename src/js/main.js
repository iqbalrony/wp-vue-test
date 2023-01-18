import { createApp } from 'vue'
import App from './App.vue'

const IrWpVueTest = createApp({
	data(){
		return {
			name: 'Admin Page Test',
		}
	}
});
IrWpVueTest.mount('#wp-vue-test');
