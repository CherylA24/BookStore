const genre = document.getElementById('genres');
let genre_array = [];

const checkGenres = (id) => {
    const check = document.getElementById('check' + id);
    if (genre_array.includes(id) === false) {
        genre_array.push(id);
        check.checked = true;
    } else {
        genre_array = remove(genre_array, id);
        check.checked = false;
    }

    console.log(genre_array);
}
const convertGenre = () => {
    genre.value = genre_array.join('_');
}
const remove = (arr, value) => {
    return arr.filter((loop) => {
        return loop !== value;
    });
}