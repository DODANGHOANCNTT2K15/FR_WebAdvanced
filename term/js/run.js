document.addEventListener('DOMContentLoaded', () => {
    const playPauseIcon = document.getElementById('play-pause');

    playPauseIcon.addEventListener('click', () => {
        if (playPauseIcon.textContent === 'play_arrow') {
            playPauseIcon.textContent = 'pause';
        } else {
            playPauseIcon.textContent = 'play_arrow';
        }

        playPauseIcon.classList.toggle('toggle');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const volumeDiv = document.querySelector('.volume');
    const volumeSliderContainer = document.querySelector('.volume-slider-container');

    volumeDiv.addEventListener('click', () => {
        if (volumeSliderContainer.style.display === 'block') {
            volumeSliderContainer.style.display = 'none';
        } else {
            volumeSliderContainer.style.display = 'block';
        }
    });

    // Đóng menu khi nhấp bên ngoài
    window.addEventListener('click', (event) => {
        if (!volumeDiv.contains(event.target) && !volumeSliderContainer.contains(event.target)) {
            volumeSliderContainer.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const icons = document.querySelectorAll('#shuffle');

    icons.forEach(icon => {
        icon.addEventListener('click', () => {
            icon.classList.toggle('toggle_opacity');
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const repeatIcon = document.getElementById('repeat');
    let clickCount = 0;

    repeatIcon.addEventListener('click', () => {
        clickCount++;
        
        if (clickCount % 3 === 1) {
            repeatIcon.textContent = 'repeat';
            repeatIcon.classList.add('toggle_opacity');
        } else if (clickCount % 3 === 2) {
            repeatIcon.textContent = 'repeat_one';
        } else {
            repeatIcon.textContent = 'repeat';
            repeatIcon.classList.remove('toggle_opacity');
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const rotateIcon = document.getElementById('rotate-icon');

    rotateIcon.addEventListener('click', () => {
        rotateIcon.classList.toggle('toggle');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.playlist-header .tab');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Xóa lớp 'active' từ tất cả các thẻ span
            tabs.forEach(item => item.classList.remove('active'));
            // Thêm lớp 'active' vào thẻ span được nhấp vào
            tab.classList.add('active');
        });
    });
});

/* Chạy dừng đĩa */
document.addEventListener('DOMContentLoaded', () => {
    const playPauseButton = document.getElementById('play-pause');
    const rotatingImage = document.getElementById('rotatingImage');
    let isRotating = true;

    playPauseButton.addEventListener('click', () => {
        if (isRotating) {
            rotatingImage.style.animationPlayState = 'paused';
            playPauseButton.textContent = 'play_arrow';
        } else {
            rotatingImage.style.animationPlayState = 'running';
            playPauseButton.textContent = 'pause';
        }
        isRotating = !isRotating;
    });
});