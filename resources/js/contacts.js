import { http } from './config';

export default {
    listen:() => {
        return http.get('');
    }
}