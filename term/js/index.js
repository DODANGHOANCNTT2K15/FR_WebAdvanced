document.addEventListener('DOMContentLoaded', (event) => {
    const profilePicture = document.querySelector('.profile-picture');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    profilePicture.addEventListener('click', () => {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Đóng menu khi nhấp bên ngoài
    window.addEventListener('click', (event) => {
        if (!profilePicture.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', (event) => {
    const menuIcon = document.querySelector('.menu-icon');
    const mainLeft = document.querySelector('.mainLeft');

    menuIcon.addEventListener('click', () => {
        mainLeft.classList.toggle('collapsed');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('createPlaylistModal');
    const createPlaylistButton = document.querySelector('.cancel');
    createPlaylistButton.onclick = function() {
        modal.classList.toggle('hidden');
    }
})

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('createPlaylistModal');
    const createPlaylistButton = document.querySelector('.create-playlist');
    createPlaylistButton.onclick = function() {
        modal.classList.toggle('hidden');
    }
})

document.addEventListener('DOMContentLoaded', () => {
    const favoriteIcon = document.getElementById('favorite');

    favoriteIcon.addEventListener('click', () => {
        if (favoriteIcon.textContent === 'favorite_border') {
            favoriteIcon.textContent = 'favorite';
        } else {
            favoriteIcon.textContent = 'favorite_border';
        }
    });
});

// hủy lưu danh sách phat
document.addEventListener('DOMContentLoaded', () => {
    const playlistAddIcon = document.getElementById('playlistModal');
    const cancelButton = document.querySelector('.cancel-saveList');

    cancelButton.addEventListener('click', () => {
        playlistAddIcon.classList.toggle('hidden');
    });
});


// mở lưu danh sách phat
document.addEventListener('DOMContentLoaded', () => {
    const playlistAddIcon = document.getElementById('playlistModal');
    const cancelButton = document.getElementById('playlist_add');

    cancelButton.addEventListener('click', () => {
        playlistAddIcon.classList.toggle('hidden');
    });
});

//mở Tạo danh sách phat

document.addEventListener('DOMContentLoaded', () => {
    const playlistAddIcon = document.getElementById('createPlaylistModal');
    const cancelButton = document.getElementById('OpenListPlay');

    cancelButton.addEventListener('click', () => {
        playlistAddIcon.classList.toggle('hidden');
    });
});

// chuyển hương đăng nhập đang ký
document.addEventListener('DOMContentLoaded', () => {
    const loginButton = document.getElementById('loginButton');
    const registerButton = document.getElementById('registerButton');

    loginButton.addEventListener('click', () => {
        window.location.href = 'login.blade.php';
    });

    registerButton.addEventListener('click', () => {
        window.location.href = 'register.blade.php';
    });
});

