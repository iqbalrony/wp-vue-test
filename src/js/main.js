import { createApp } from 'vue'
// import App from './App.vue'

// createApp({
//   data() {
//     return {
// 		return {
// 			name: 'Admin Page Test',
// 		}
//     }
//   }
// }).mount('#app');
const IrWpVueTest = createApp({
	data(){
		return {
			name: 'Admin Page Test',
		}
	}
});
IrWpVueTest.mount('#wp-vue-test');
