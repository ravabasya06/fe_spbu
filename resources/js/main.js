import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import { FontAwesomeIcon } from "./font-awesome";

// Create the app instance
const app = createApp(App);

// Use the router
app.use(router);

// Register the FontAwesome component
app.component("font-awesome-icon", FontAwesomeIcon);

// Mount the app
app.mount("#app");
