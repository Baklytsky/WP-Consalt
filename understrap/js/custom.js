'use strict';
let forward = document.querySelectorAll('.forward'),
    forwardLayer = document.querySelectorAll('.forward-layer'),
    happyClients = document.querySelectorAll('.happy-clients'),
    itemClients = document.querySelectorAll('.item-clients'),
    clientsComment = document.querySelectorAll('.clients-comment'),
    indicators = document.querySelectorAll('.indicators'),
    topPostsBtn = document.querySelector('.top-posts-btn'),
    topPosts = document.querySelector('.top-posts'),
    allPostsBtn = document.querySelector('.all-posts-btn'),
    allPosts = document.querySelector('.all-posts'),
    blogImg = document.querySelector('.blog-img'),
    blogPage = document.querySelector('.our-blog'),
    shareIcon = document.querySelectorAll('.share-btn'),
    shareLinks = document.querySelectorAll('.social-links'),
    block;


if (forward) {
    for (let i = 0; i < forward.length; i++) {
        forward[i].addEventListener('click', function () {
            block = i;
            forwardLayer[block].style.display = 'block';
            reset();
        })
    }

    function reset() {
        for (let i = 0; i < forwardLayer.length; i++) {
            forwardLayer[i].addEventListener('mouseleave', function () {
                forwardLayer[i].style.display = 'none';
            })
        }
    }
}

if (shareIcon) {
    for (let i = 0; i < shareIcon.length; i++) {
        shareIcon[i].addEventListener('click', () => {
            shareLinks[i].classList.toggle('social-links-active')
        });
    }
}


if (allPostsBtn) {
    allPostsBtn.addEventListener('click', function () {
        topPosts.style.display = 'none';
        blogImg.style.display = 'none';
        allPosts.style.display = 'block';
        topPostsBtn.classList.remove('active');
        allPostsBtn.classList.add('active');
        blogPage.style.maxHeight = '1500px';
    });

    topPostsBtn.addEventListener('click', function () {
        topPosts.style.display = 'block';
        blogImg.style.display = 'block';
        allPosts.style.display = 'none';
        topPostsBtn.classList.add('active');
        allPostsBtn.classList.remove('active');
        blogPage.style.maxHeight = '750px';
    });
}


// if (happyClients) {
//     for (let i = 0; i < itemClients.length; i++) {
//
//         itemClients[0].classList.add('item-clients-active');
//         indicators[0].classList.add('indicators-active');
//         clientsComment[0].classList.add('clients-comment-active');
//
//         itemClients[i].addEventListener('click', function () {
//
//             itemClients[i].classList.add('item-clients-active');
//             indicators[i].classList.add('indicators-active');
//             clientsComment[i].classList.add('clients-comment-active');
//         });
//     }
// }

if (happyClients) {

    for (let i = 0; i < itemClients.length; i++) {

        itemClients[0].classList.add('item-clients-active');
        indicators[0].classList.add('indicators-active');
        clientsComment[0].classList.add('clients-comment-active');


        if (itemClients) {
            indicators[0].addEventListener('click', clientOne);
            itemClients[0].addEventListener('click', clientOne);

            function clientOne() {
                clientsComment[0].classList.add('clients-comment-active');
                itemClients[0].classList.add('item-clients-active');
                indicators[0].classList.add('indicators-active');
                clientsComment[1].classList.remove('clients-comment-active');
                itemClients[1].classList.remove('item-clients-active');
                indicators[1].classList.remove('indicators-active');
                clientsComment[2].classList.remove('clients-comment-active');
                itemClients[2].classList.remove('item-clients-active');
                indicators[2].classList.remove('indicators-active');
            }

            indicators[1].addEventListener('click', clientTwo);
            itemClients[1].addEventListener('click', clientTwo);

            function clientTwo() {
                clientsComment[1].classList.add('clients-comment-active');
                itemClients[1].classList.add('item-clients-active');
                indicators[1].classList.add('indicators-active');
                clientsComment[0].classList.remove('clients-comment-active');
                itemClients[0].classList.remove('item-clients-active');
                indicators[0].classList.remove('indicators-active');
                clientsComment[2].classList.remove('clients-comment-active');
                itemClients[2].classList.remove('item-clients-active');
                indicators[2].classList.remove('indicators-active');
            }

            indicators[2].addEventListener('click', clientsThree);
            itemClients[2].addEventListener('click', clientsThree);

            function clientsThree() {
                clientsComment[2].classList.add('clients-comment-active');
                itemClients[2].classList.add('item-clients-active');
                indicators[2].classList.add('indicators-active');
                clientsComment[0].classList.remove('clients-comment-active');
                itemClients[0].classList.remove('item-clients-active');
                indicators[0].classList.remove('indicators-active');
                clientsComment[1].classList.remove('clients-comment-active');
                itemClients[1].classList.remove('item-clients-active');
                indicators[1].classList.remove('indicators-active');
            }
        }
    }
}






