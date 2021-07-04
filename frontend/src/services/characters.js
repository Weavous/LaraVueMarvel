import { http } from './http.js';

export default {
    index: (characters) => { return http.get(`/marvel/characters?characters=${characters.join(",")}`) },
    search: (character) => { return http.get(`/marvel/character?character=${character}`) }
};