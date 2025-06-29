import './bootstrap';
<<<<<<< HEAD

let buttonLike = document.querySelectorAll('.likeButton');
buttonLike.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');

        axios.post(`/posts/${id}/add/like`)
            .then(response => {
                document.getElementById('likeCount').textContent = response.data.likes
            })
            .catch(error => {
                console.log('Error: ')
            });
    })
});
=======
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994
