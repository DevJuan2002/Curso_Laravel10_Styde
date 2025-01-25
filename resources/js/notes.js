import {createApp} from 'vue';
import notes from './components/notes.vue';


const app = createApp (
    {

    }
)
app.component('notes', notes)
app.mount('#notes')

